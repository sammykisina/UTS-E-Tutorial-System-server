<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'type' => 'tutorial',
            'attributes' => [
                'points' => $this->points,
                'doneIn' => $this->created_at,
                'tutorial_id' => $this->tutorial_id
            ],
            'relationships' => [
                'tutorial' => new TutorialResource(
                    resource: $this->whenLoaded(
                        relationship: 'tutorial'
                    )
                ),
                'student' => new StudentResource(
                    resource: $this->whenLoaded(
                        relationship: 'student'
                    )
                )
            ]
        ];
    }
}
