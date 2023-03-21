<?php

declare(strict_types=1);

namespace App\Http\Services\Authenticated;

use App\Models\Discussion;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

class DiscussionService {
    public function getDiscussions(): Collection {
        return QueryBuilder::for(subject: Discussion::class)
                      ->allowedIncludes(includes: ['owner', 'unit', 'comments.owner'])
                      ->defaultSort('-created_at')
                      ->get();
    }

    public function createDiscussion(array $discussionNewData): Discussion {
        return Discussion::create($discussionNewData);
    }

    public function updateDiscussion(array $discussionUpdatedData, Discussion $discussion): bool {
        return $discussion->update($discussionUpdatedData);
    }

    public function deleteDiscussion(Discussion $discussion): bool {
        return $discussion->delete();
    }
}
