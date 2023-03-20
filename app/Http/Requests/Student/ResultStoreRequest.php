<?php

declare(strict_types=1);

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class ResultStoreRequest extends FormRequest {
    public function rules(): array {
        return [
            'points' => [
                'required',
                'numeric'
            ],
            'tutorial_id' => [
                'required',
                'numeric',
                'exists:tutorials,id'
            ],
            'student_id' => [
                'required',
                'numeric',
                'exists:users,id'
            ]
        ];
    }

    public function getNewResultData(): array {
        return $this->validated();
    }
}
