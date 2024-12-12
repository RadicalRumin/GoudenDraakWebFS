<?php

use App\Http\Controllers\DishSearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use Inertia\Inertia;

Route::domain("restaurant." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Restaurant/Restaurant');
    });
});

Route::domain("kassa." . env('APP_URL'))->group(function () {
    Route::get('/', [DishSearchController::class, 'index']);
});

Route::domain("admin." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Test');
    });
});

Route::get('/', function () {
    $dragonImage = asset('/images/dragon-small.avif');

    return Inertia::render('Website/Index',
        [
            'dragonImage' => $dragonImage
        ]
    );
});

Route::get('/menu/pdf', [MenuController::class, 'generatePdf']);