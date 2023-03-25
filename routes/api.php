<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/',[\App\Http\Controllers\ApiController::class, 'index']);
Route::get('/db-status',[\App\Http\Controllers\ApiController::class, 'checkDatabaseConnection']);
Route::post('artisan/run', [\App\Http\Controllers\ArtisanController::class, 'run'])->name('artisan');
Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
