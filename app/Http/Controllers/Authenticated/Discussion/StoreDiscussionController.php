<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authenticated\Discussion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticated\DiscussionStoreRequest;
use App\Http\Services\Authenticated\DiscussionService;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class StoreDiscussionController extends Controller {
    public function __invoke(
        DiscussionStoreRequest $request,
        DiscussionService $discussionService
    ): JsonResponse {
        if ($discussionService->createDiscussion(discussionNewData: $request->getNewDiscussionData())) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => 'Discussion posted successfully.'
                ],
                status: Http::CREATED()
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong. Discussion not created.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
