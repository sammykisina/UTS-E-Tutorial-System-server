<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscussionResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'attributes' => [
                'discussion' => $this->discussion,
                'bgColor' => $this->bgColor,
                'createdAt' => $this->created_at
            ],
            'relationships' => [
                'owner' => new StudentResource(
                    resource: $this->whenLoaded(
                        relationship: 'owner'
                    )
                ),
                'unit' => new UnitResource(
                    resource: $this->whenLoaded(
                        relationship: 'unit'
                    )
                ),
                'comments' => CommentResource::collection(
                    resource: $this->whenLoaded(
                        relationship: 'comments'
                    )
                )
            ]
        ];
    }
}
