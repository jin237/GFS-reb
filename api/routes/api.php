<?php

use App\Http\Controllers\MurmurController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('murmur', [MurmurController::class, 'index'])->name('murmur');
Route::get('murmur/{id}', [MurmurController::class, 'show']);
Route::post('murmur', [MurmurController::class, 'store']);
Route::put('murmur/{id}', [MurmurController::class, 'update']);
Route::delete('murmur/{id}', [MurmurController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);