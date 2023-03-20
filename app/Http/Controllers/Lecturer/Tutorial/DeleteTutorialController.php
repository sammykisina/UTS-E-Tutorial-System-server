<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lecturer\Tutorial;

use App\Http\Controllers\Controller;
use App\Http\Services\Lecturer\TutorialService;
use App\Models\Tutorial;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use JustSteveKing\StatusCode\Http;

class DeleteTutorialController extends Controller {
    public function __invoke(
        Tutorial $tutorial,
        TutorialService $tutorialService
    ): JsonResponse {
        try {
            if (!$tutorial->published) {
                if ($tutorialService->deleteTutorial(tutorial: $tutorial)) {
                    return response()->json(
                        data: [
                            'error' => 0,
                            'message' => 'Tutorial deleted successfully.'
                        ],
                        status: Http::ACCEPTED()
                    );
                }
            }
        } catch (\Throwable $th) {
            Log::info($th);
            return response()->json(
                data: [
                    'error' => 1,
                    'message' => 'Something went wrong. Tutorial not deleted.'
                ],
                status: Http::NOT_IMPLEMENTED()
            );
        }
    }
}
