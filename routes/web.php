<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/demo/', [DemoController::class, 'index']);

# pixelate image
Route::get('/demo/pixelate-image/', [DemoController::class, 'pixelateImage']);
Route::post('/demo/pixelate-image/', [DemoController::class, 'postPixelateImage']);
