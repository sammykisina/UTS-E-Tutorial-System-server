<?php

declare(strict_types=1);

use App\Http\Controllers\Authenticated\Comment\StoreCommentController;
use App\Http\Controllers\Authenticated\Discussion\DeleteDiscussionController;
use App\Http\Controllers\Authenticated\Discussion\IndexDiscussionController;
use App\Http\Controllers\Authenticated\Discussion\StoreDiscussionController;
use App\Http\Controllers\Authenticated\Discussion\UpdateDiscussionController;
use App\Http\Controllers\Authenticated\IndexUnitController;
use App\Http\Controllers\Authenticated\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'units',
    'as' => 'units:',
], function () {
    Route::get('/', IndexUnitController::class)->name('unitIndex');
});

Route::group([
    'prefix' => 'discussions',
    'as' => 'discussions:',
], function () {
    Route::get('/', IndexDiscussionController::class)->name('discussionIndex');
    Route::post('/', StoreDiscussionController::class)->name('discussionStore');
    Route::patch('/{discussion}', UpdateDiscussionController::class)->name('discussionUpdate');
    Route::delete('/{discussion}', DeleteDiscussionController::class)->name('discussionDelete');

    Route::group([
        'prefix' => 'comments',
        'as' => 'comments:',
    ], function () {
        Route::post('/', StoreCommentController::class)->name('commentStore');
    });
});

Route::post('/password-reset', UpdatePasswordController::class)->name('password-reset');
