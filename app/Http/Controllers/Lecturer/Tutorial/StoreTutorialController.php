<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lecturer\Tutorial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lecturer\TutorialStoreRequest;
use App\Http\Services\Lecturer\TutorialService;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class StoreTutorialController extends Controller {
    public function __invoke(
        TutorialStoreRequest $request,
        TutorialService $tutorialService
    ): JsonResponse {
        if ($tutorialService->createTutorial(newTutorialData:$request->getNewTutorialData())) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => 'Tutorial Created Successfully.'
                ],
                status: Http::CREATED()
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong.Tutorial not created.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
