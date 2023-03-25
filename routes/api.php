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
Route::get('/',[\App\Http\Controllers\ApiController::class, 'index'])->name('default');
Route::get('/401', function () {
    return response()->json(['error' => 'Unauthorized'], 401)
        ->header('Content-Type', 'application/json')
        ->header('X-Route-Name', 'unauthorized');
})->name('unauthorized');
Route::post('artisan/run', [\App\Http\Controllers\ArtisanController::class, 'run'])->name('artisan');
Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/me',[\App\Http\Controllers\UserController::class,'userInfo']);
    Route::get('/users',[\App\Http\Controllers\UserController::class,'getUsersList']);
    Route::get('/messages',[\App\Http\Controllers\MessagesController::class,'getAllMessages']);
});

