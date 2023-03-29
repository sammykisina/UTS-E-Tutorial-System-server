<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest {
    public function rules(): array {
        return [
            'email' => [
                'required',
                'email',
                'exists:users,email'
            ]
        ];
    }
}
