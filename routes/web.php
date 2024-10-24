<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::domain("restaurant." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('RestaurantTest');
    });
});

Route::domain("kassa." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Test');
    });
});

Route::domain("admin." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Test');
    });
});

Route::get('/', function () {
    $dragonImage = asset('/images/dragon-small.png');

    return Inertia::render('Website/Index',
        [
            'dragonImage' => $dragonImage
        ]
    );
});
