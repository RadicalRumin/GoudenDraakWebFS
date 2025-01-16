<?php

use App\Http\Controllers\DishSearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ExportController;
use Inertia\Inertia;

Route::domain("restaurant." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('RestaurantTest');
    });
});

Route::domain("kassa." . env('APP_URL'))->group(function () {
    Route::get('/', [DishSearchController::class, 'index']);
});

Route::domain("admin." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Test');
    });
    Route::get('/exports', [ExportController::class, 'index']);
    Route::get('/exports/{file}', [ExportController::class, 'download'])->name('exports.download');
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