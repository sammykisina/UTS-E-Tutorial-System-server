<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/**
 * auth routes
 */
Route::prefix('auth')->as('auth:')->group(
    base_path('routes/v1/auth.php')
);

/**
 * admin routes
 */
Route::prefix('admin')
    ->as('admin:')
    ->middleware(['auth:sanctum', 'ability:admin'])
    ->group(
        base_path('routes/v1/admin.php')
    );

/**
 * lecturer routes
 */
Route::prefix('lecturer')
    ->as('lecturer:')
    ->middleware(['auth:sanctum', 'ability:lecturer'])
    ->group(
        base_path('routes/v1/lecturer.php')
    );

/**
 * authenticated users routes
 */
