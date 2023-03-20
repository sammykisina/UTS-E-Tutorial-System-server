<?php

declare(strict_types=1);

namespace App\Http\Services\Lecturer;

use App\Models\Tutorial;

class TutorialService {
    public function createTutorial(array $newTutorialData): Tutorial {
        return Tutorial::create($newTutorialData);
    }

    public function updateTutorial(array $updatedTutorialData, Tutorial $tutorial): bool {
        return $tutorial->update($updatedTutorialData);
    }

    public function deleteTutorial(Tutorial $tutorial): bool {
        return $tutorial->delete();
    }
}
