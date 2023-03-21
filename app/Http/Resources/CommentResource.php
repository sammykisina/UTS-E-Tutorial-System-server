<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'type' => 'comment',
            'attributes' => [
                'comment' => $this->comment,
                'createdAt' => $this->created_at
            ],
            'relationships' => [
                'owner' => new StudentResource(
                    resource: $this->whenLoaded(
                        relationship: 'owner'
                    )
                )
            ]
        ];
    }
}
