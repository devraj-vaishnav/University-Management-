<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\profileContoller;
use App\Http\Controllers\admin\DaskBoardController;
use App\Http\Controllers\user\DaskBoardController;
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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::get('admin', [DaskBoardController::class, 'admin'])->name('admin');

});
Route::group(['middleware' => ['role:user', 'auth']], function () {
    Route::get('user', [HomeController::class, 'user'])->name('user');
});
