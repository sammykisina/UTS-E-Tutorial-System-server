<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authenticated\Discussion;

use App\Http\Controllers\Controller;
use App\Http\Services\Authenticated\DiscussionService;
use App\Models\Discussion;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class DeleteDiscussionController extends Controller {
    public function __invoke(Discussion $discussion, DiscussionService $discussionService): JsonResponse {
        if ($discussionService->deleteDiscussion(discussion: $discussion)) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => 'Discussion deleted successfully.'
                ],
                status: Http::ACCEPTED()
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong. Discussion  not deleted.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
