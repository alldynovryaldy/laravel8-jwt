<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\LogoutController;
use App\Http\Controllers\api\RegisterController;

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


Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
Route::post('logout', LogoutController::class)->name('logout');

// auth:api => lihat di /config/auth.php pada bagian "Authentication Guards"
Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});
