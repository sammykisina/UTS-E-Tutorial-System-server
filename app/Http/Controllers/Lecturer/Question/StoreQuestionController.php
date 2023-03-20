<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lecturer\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lecturer\QuestionStoreRequest;
use App\Http\Resources\TutorialResource;
use App\Http\Services\Lecturer\TutorialQnService;
use App\Models\Tutorial;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use JustSteveKing\StatusCode\Http;

class StoreQuestionController extends Controller {
    public function __invoke(
        QuestionStoreRequest $request,
        TutorialQnService $tutorialQnService,
    ): JsonResponse {
        DB::beginTransaction();
        try {
            $question = $tutorialQnService->createTutorialQn(newTutorialQnData: $request->getNewTutorialQnData());

            foreach ($request->get(key: "answers") as $answer) {
                $tutorialQnService->createTutorialQnAnswer([
                    'identity' => $answer['identity'],
                    'answer' => $answer['answer'],
                    'question_id' => $question->id
                ]);
            }

            $tutorial = Tutorial::query()
                    ->with(['unit', 'questions.answers'])
                    ->where('id', $request->get(key: 'tutorial_id'))
                    ->first();

            if ($tutorial->numberOfQuestions == count($tutorial->questions)) {
                $tutorial->update([
                    'published' => true,
                    'dueDate' => Carbon::now()->addDays($tutorial->numberOfValidDays)
                ]);
            }

            DB::commit();

            return response()->json(
                data: [
                    'error' => 0,
                    'tutorial' => new TutorialResource(
                        resource: $tutorial
                    ),
                    'message' => 'Question Created Successfully.'
                ],
                status: Http::CREATED()
            );
        } catch (\Throwable $th) {
            Log::info($th);
            DB::rollBack();
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong.Question not created.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
