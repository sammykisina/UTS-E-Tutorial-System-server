<?php

declare(strict_types=1);

namespace App\Http\Services\Auth;

use App\Models\User;

class ProfileService {
    public function getLecturerProfile(User $lecturer): User {
        return User::query()
            ->where('id', $lecturer->id)
            ->with([
                'units',
                'tutorials.unit',
                'tutorials.questions.answers',
                'tutorials.results.student',
                'discussions.owner',
                'discussions.unit',
                'discussions.comments.owner'
            ])->first();
    }

    public function getStudentProfile(User $student): User {
        return User::query()
            ->where('id', $student->id)
            ->with([
                'course.units',
                'results.tutorial.unit',
                'discussions.owner',
                'discussions.unit',
                'discussions.comments.owner'
            ])->first();
    }

    public function updatePassword(array $updatePasswordData): bool {
        $user = User::query()
            ->where('email', $updatePasswordData['email'])
            ->first();

        return $user->update([
            'password' => $updatePasswordData['password']
        ]);
    }
}
