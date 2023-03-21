<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authenticated\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticated\CommentStoreRequest;
use App\Http\Services\Authenticated\CommentService;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class StoreCommentController extends Controller {
    public function __invoke(
        CommentStoreRequest $request,
        CommentService $commentService
    ): JsonResponse {
        if ($commentService->createComment(newCommentData: $request->getNewCommentData())) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => 'Comment created successfully.'
                ],
                status: Http::OK()
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong. Comment not created.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
