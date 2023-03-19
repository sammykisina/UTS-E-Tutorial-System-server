<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TutorialResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'type' => 'tutorial',
            'attributes' => [
                'description' => $this->description,
                'icon' => $this->icon,
                'numberOfQuestions' => $this->numberOfQuestions,
                'timeToTakeInTutorial' => $this->timeToTakeInTutorial,
                'numberOfPointsForEachQuestion' => $this->numberOfPointsForEachQuestion,
                'published' => $this->published,
                'bgColor' => $this->bgColor,
                'dueDate' => $this->dueDate
            ],
            'relationships' => [
                'unit' => new UnitResource(
                    resource: $this->whenLoaded(
                        relationship: 'unit'
                    )
                ),
                'questions' => QuestionResource::collection(
                    resource: $this->whenLoaded(
                        relationship: 'questions'
                    )
                )
            ]
        ];
    }
}
