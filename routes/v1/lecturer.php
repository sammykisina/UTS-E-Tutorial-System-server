<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LecturerProfileController;
use App\Http\Controllers\Lecturer\Question\StoreQuestionController;
use App\Http\Controllers\Lecturer\Tutorial\StoreTutorialController;
use Illuminate\Support\Facades\Route;

Route::get('/{lecturer}/profile', LecturerProfileController::class)->name('lecturerProfile');

Route::group([
    'prefix' => 'tutorials',
    'as' => 'tutorials:',
], function () {
    Route::post('/', StoreTutorialController::class)->name('tutorialStore');
    // Route::patch('/{unit}', UpdateUnitController::class)->name('unitUpdate');
    // Route::delete('/{unit}', DeleteUnitController::class)->name('unitDelete');

    Route::group([
        'prefix' => 'questions',
        'as' => 'question:'
    ], function () {
            Route::post('/', StoreQuestionController::class)->name('questionStore');
    });
});
