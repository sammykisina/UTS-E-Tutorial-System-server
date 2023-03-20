<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lecturer\Tutorial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lecturer\TutorialUpdateRequest;
use App\Http\Services\Lecturer\TutorialService;
use App\Models\Tutorial;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class UpdateTutorialController extends Controller {
    public function __invoke(
        TutorialUpdateRequest $request,
        Tutorial $tutorial,
        TutorialService $tutorialService
    ): JsonResponse {
        if ($tutorialService->updateTutorial(updatedTutorialData:$request->getUpdatedTutorialData(), tutorial: $tutorial)) {
            return response()->json(
                data: [
                    'error' => 0,
                    'message' => 'Tutorial Updated Successfully.'
                ],
                status: Http::ACCEPTED()
            );
        } else {
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong.Tutorial not updated.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
