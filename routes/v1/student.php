<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\StudentProfileController;
use App\Http\Controllers\Student\ResultStoreController;
use App\Http\Controllers\Student\TutorialIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/{student}/profile', StudentProfileController::class)->name('studentProfile');

Route::group([
    'prefix' => 'tutorials',
    'as' => 'tutorials:',
], function () {
    Route::get('/', TutorialIndexController::class)->name('tutorialIndex');

    Route::group([
        'prefix' => 'results',
        'as' => 'results:',
    ], function () {
        Route::post('/', ResultStoreController::class)->name('resultsStore');
    });
});
