<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lecturer\Question;

use App\Http\Controllers\Controller;
use App\Http\Resources\TutorialResource;
use App\Models\Question;
use App\Models\Tutorial;
use JustSteveKing\StatusCode\Http;

class DeleteQuestionController extends Controller {
    public function __invoke(Question $question) {
        // delete qn
        $question->delete();


        $tutorial = Tutorial::query()
                    ->with(['unit', 'questions.answers'])
                    ->where('id', $question->tutorial_id)
                    ->first();


        return response()->json(
            data: [
                'error' => 0,
                'tutorial' => new TutorialResource(
                    resource: $tutorial
                ),
                'message' => 'Question deleted successfully.'
            ],
            status: Http::ACCEPTED()
        );
    }
}
