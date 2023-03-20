<?php

declare(strict_types=1);

namespace App\Http\Services\Student;

use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

class TutorialService {
    public function getTutorials(): Collection {
        return QueryBuilder::for(subject: Tutorial::class)
                           ->allowedIncludes(includes: ['unit','questions.answers'])
                           ->defaultSort('-created_at')
                           ->get();
    }
}
