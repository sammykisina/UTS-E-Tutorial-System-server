<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LecturerProfileController;
use App\Http\Controllers\Lecturer\Question\StoreQuestionController;
use App\Http\Controllers\Lecturer\Tutorial\DeleteTutorialController;
use App\Http\Controllers\Lecturer\Tutorial\StoreTutorialController;
use App\Http\Controllers\Lecturer\Tutorial\UpdateTutorialController;
use Illuminate\Support\Facades\Route;

Route::get('/{lecturer}/profile', LecturerProfileController::class)->name('lecturerProfile');

Route::group([
    'prefix' => 'tutorials',
    'as' => 'tutorials:',
], function () {
    Route::post('/', StoreTutorialController::class)->name('tutorialStore');
    Route::patch('/{tutorial}', UpdateTutorialController::class)->name('tutorialUpdate');
    Route::delete('/{tutorial}', DeleteTutorialController::class)->name('tutorialDelete');

    Route::group([
        'prefix' => 'questions',
        'as' => 'question:'
    ], function () {
        Route::post('/', StoreQuestionController::class)->name('questionStore');
    });
});
