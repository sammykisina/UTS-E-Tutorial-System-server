<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Services\Auth\ProfileService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class ForgotPasswordController extends Controller {
    public function __invoke(
        ForgotPasswordRequest $request,
        ProfileService $service
    ): JsonResponse {
        $user = User::query()->where('email', $request->get(key: 'email'))->first();

        $service->forgotPassword(user: $user);

        return new JsonResponse(
            data: [
                'error' => 0,
                'message' => 'Your password was updated by the system.',
            ],
            status: Http::ACCEPTED()
        );
    }
}
