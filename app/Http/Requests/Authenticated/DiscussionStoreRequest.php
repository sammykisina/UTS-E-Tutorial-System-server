<?php

declare(strict_types=1);

namespace App\Http\Requests\Authenticated;

use Illuminate\Foundation\Http\FormRequest;

class DiscussionStoreRequest extends FormRequest {
    public function rules(): array {
        return [
            'discussion' => [
                'required',
                'string'
            ],
            'bgColor' => [
                'required',
                'string'
            ],
            'unit_id' => [
                'required',
                'numeric',
                'exists:units,id'
            ],
            'user_id' => [
                'required',
                'numeric',
                'exists:users,id'
            ]
        ];
    }

    public function getNewDiscussionData(): array {
        return $this->validated();
    }
}
