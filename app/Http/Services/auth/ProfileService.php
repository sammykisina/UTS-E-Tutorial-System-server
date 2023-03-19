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
            ])->first();
    }
}
