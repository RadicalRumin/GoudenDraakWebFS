<?php

use App\Http\Controllers\KassaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BillController;
use Inertia\Inertia;

Route::domain("restaurant." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('RestaurantTest');
    });
});

Route::domain("kassa." . env('APP_URL'))->group(function () {
    Route::get('/', [KassaController::class, 'index']);
    Route::post('/bill/pdf', [BillController::class, 'kassaBill']);
});

Route::domain("admin." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Test');
    });
});

Route::domain("review." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Review/ReviewForm');
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
Route::get('/bill/pdf', [BillController::class, 'generateBill']);
