<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KlubController;
use App\Http\Controllers\Admin\SkorController;
use App\Http\Controllers\Admin\KlasmenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'indexPage');
});

Route::controller(KlubController::class)->group(function () {
    Route::get('/klub', 'indexPage');
    Route::get('/klub/add', 'addPage');
    Route::post('/klub/add', 'add');
});

Route::controller(SkorController::class)->group(function () {
    Route::get('/skor', 'indexPage');
    Route::get('/skor/add', 'addPage');
    Route::post('/skor/add', 'add');
});

Route::controller(KlasmenController::class)->group(function () {
    Route::get('/klasmen', 'indexPage');
});
