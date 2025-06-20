<?php

use App\Http\Controllers\DishCheckoutRestaurantController;
use App\Http\Controllers\DishOverviewRestaurantController;
use App\Http\Controllers\DishSearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\RestaurantOrderHistoryController;
use App\Http\Controllers\AuthRestaurantController;
use App\Http\Controllers\ResetRestaurantController;
use App\Http\Middleware\AuthenticateForReset;
use App\Http\Middleware\TableAuthenticated;
use App\Http\Controllers\ScheduleController;
use Inertia\Inertia;
use App\Http\Controllers\ForgetRestaurantAuthCookieController;

Route::domain("restaurant." . env('APP_URL'))->group(function () {
    Route::middleware(TableAuthenticated::class)->group(function () {
        Route::resource('/', DishOverviewRestaurantController::class)->names([
            'index' => 'dish-overview.index',
            'store' => 'dish-overview.store',
        ]);
        Route::resource('/checkout', DishCheckoutRestaurantController::class);
        Route::resource('/reset', ResetRestaurantController::class);
        Route::resource('/orderhistory', RestaurantOrderHistoryController::class);
    });

    Route::resource('/auth', AuthRestaurantController::class)->names([
        'index' => 'auth.index'
    ]);
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
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::put('/schedule/{week}', [ScheduleController::class, 'update'])->name('schedule.update');
});

Route::domain("review." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return Inertia::render('Review/ReviewForm');
    });
});


Route::get('/', function () {
    $dragonImage = asset('/images/dragon-small.avif');

    return Inertia::render(
        'Website/Index',
        [
            'dragonImage' => $dragonImage
        ]
    );
});
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/search', [MenuController::class, 'search']);

Route::get('/menu/pdf', [MenuController::class, 'generatePdf']);
Route::get('/bill/show/{tableArray?}', [BillController::class, 'showBill'])->name('bill.show');
Route::get('/bill', [BillController::class, 'showBill'])->name('bill.show');
Route::get('/bill/download', [BillController::class, 'downloadBill'])->name('bill.download');

Route::get('/forget-restaurant-auth', ForgetRestaurantAuthCookieController::class);
Route::get('/bill/pdf', [BillController::class, 'generateBill']);

