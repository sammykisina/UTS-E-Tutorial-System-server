<?php

declare(strict_types=1);

namespace App\Http\Services\Authenticated;

use App\Models\Comment;

class CommentService {
    public function createComment(array $newCommentData): Comment {
        return Comment::create($newCommentData);
    }
}
