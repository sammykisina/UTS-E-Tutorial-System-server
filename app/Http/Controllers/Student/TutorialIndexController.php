<?php

declare(strict_types=1);

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\TutorialResource;
use App\Http\Services\Student\TutorialService;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class TutorialIndexController extends Controller {
    public function __invoke(TutorialService $tutorialService): JsonResponse {
        return response()->json(
            data: TutorialResource::collection(
                resource: $tutorialService->getTutorials()
            ),
            status: Http::OK()
        );
    }
}
