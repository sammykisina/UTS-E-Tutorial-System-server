<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authenticated\Discussion;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiscussionResource;
use App\Http\Services\Authenticated\DiscussionService;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class IndexDiscussionController extends Controller {
    public function __invoke(DiscussionService $discussionService): JsonResponse {
        return response()->json(
            data: DiscussionResource::collection(
                resource: $discussionService->getDiscussions()
            ),
            status: Http::OK()
        );
    }
}
