<?php

use Illuminate\Support\Facades\Route;

Route::domain("restaurant." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return dd("hello restaurant");
    });
});

Route::domain("kassa." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return dd("hello kassa");
    });
});

Route::domain("admin." . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return dd("hello admin");
    });
});

Route::get('/', function () {
    return view('welcome');
});
