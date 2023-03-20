<?php

declare(strict_types=1);

namespace App\Http\Requests\Lecturer;

use Illuminate\Foundation\Http\FormRequest;

class TutorialUpdateRequest extends FormRequest {
    public function rules(): array {
        return [
            'description' => [
                'required',
                'string'
            ],
            'icon' => [
                'required',
                'string'
            ],
            'numberOfQuestions' => [
                'required',
                'numeric'
            ],
            'unit_id' => [
                'required',
                'numeric',
                'exists:units,id'
            ],
            'numberOfValidDays' => [
                'required',
                'numeric',
                'min:1'
            ],
            'numberOfPointsForEachQuestion' => [
                'required',
                'numeric',
                'min:1'
            ],
            'timeToTakeInTutorial' => [
                'required',
                'numeric',
                'min:5'
            ],
            'bgColor' => [
                'required',
                'string'
            ]
        ];
    }

     public function getUpdatedTutorialData(): array {
         return  $this->validated();
     }
}
