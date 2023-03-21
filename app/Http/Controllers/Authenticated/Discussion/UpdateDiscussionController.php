<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authenticated\Discussion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticated\DiscussionUpdateRequest;
use App\Http\Services\Authenticated\DiscussionService;
use App\Models\Discussion;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class UpdateDiscussionController extends Controller {
    public function __invoke(
        DiscussionUpdateRequest $request,
        Discussion $discussion,
        DiscussionService $discussionService
    ): JsonResponse {
        if ($discussionService->updateDiscussion(
            discussionUpdatedData: $request->getUpdatedDiscussionData(),
            discussion: $discussion
        )) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => 'Discussion updated successfully.'
                ],
                status: Http::ACCEPTED()
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong. Discussion not updated.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
