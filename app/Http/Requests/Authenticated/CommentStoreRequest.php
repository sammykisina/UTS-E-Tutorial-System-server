<?php

declare(strict_types=1);

namespace App\Http\Requests\Authenticated;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest {
    public function rules(): array {
        return [
            'comment' => [
                'required',
                'string',
            ],
            'discussion_id' => [
                'required',
                'numeric',
                'exists:discussions,id'
            ],
            'user_id' => [
                'required',
                'numeric',
                'exists:users,id'
            ]
        ];
    }

    public function getNewCommentData(): array {
        return $this->validated();
    }
}
