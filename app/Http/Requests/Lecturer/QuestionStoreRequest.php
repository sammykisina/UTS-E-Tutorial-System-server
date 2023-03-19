<?php

declare(strict_types=1);

namespace App\Http\Requests\Lecturer;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest {
    public function rules(): array {
        return [
            'question' => [
                'required',
                'string',
            ],
            'correctAnswer' => [
                'required',
                'string',
            ],
            'answers' => [
                'required',
                'array'
            ],
            'tutorial_id' => [
                'required',
                'exists:tutorials,id'
            ]
        ];
    }

    public function getNewTutorialQnData(): array {
        return $this->validated();
    }
}
