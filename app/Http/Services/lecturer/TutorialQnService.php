<?php

declare(strict_types=1);

namespace App\Http\Services\Lecturer;

use App\Models\Answer;
use App\Models\Question;

class TutorialQnService {
    public function createTutorialQn(array $newTutorialQnData): Question {
        return Question::create($newTutorialQnData);
    }

    public function createTutorialQnAnswer(array $tutorialQnAnswerData): void {
        Answer::create($tutorialQnAnswerData);
    }
}
