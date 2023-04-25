<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lecturer\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lecturer\QuestionUpdateRequest;
use App\Http\Resources\TutorialResource;
use App\Http\Services\Lecturer\TutorialQnService;
use App\Models\Question;
use App\Models\Tutorial;
use JustSteveKing\StatusCode\Http;

class UpdateQuestionController extends Controller {
    public function __invoke(Question $question, QuestionUpdateRequest $request, TutorialQnService $tutorialQnService) {
        // update the qn and correct answer
        $question->update([
            'question' => $request->get(key: 'question'),
            'correctAnswer' => $request->get(key: 'correctAnswer')
        ]);

        // delete current answers
        $question->answers()->delete();

        foreach ($request->get(key: "answers") as $answer) {
            $tutorialQnService->createTutorialQnAnswer([
                'identity' => $answer['identity'],
                'answer' => $answer['answer'],
                'question_id' => $question->id
            ]);
        }

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
                'message' => 'Question updated Created Successfully.'
            ],
            status: Http::ACCEPTED()
        );
    }
}
