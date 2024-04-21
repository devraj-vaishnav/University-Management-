<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PartyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QuotationController;

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
    return view('auth.login');
});

Route::get('clearcache', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
});


Route::get('migrate', function () {
    Artisan::call('migrate');
    Artisan::call('db:seed');
});


Auth::routes();
Route::group(['middleware' => ['role:admin', 'auth'], 'prefix' => 'admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('profile', [ProfileController::class, 'create'])->name('profile');
    Route::post('profile/update/{id}', [ProfileController::class,'updateProfile'])->name('profile.update');
    Route::post('profile/password/{id}', [ProfileController::class,'updatePassword'])->name('profile.password');

    //Party
    Route::get('party/getData', [PartyController::class, 'getData'])->name('party.getData');
    Route::resource('party', PartyController::class);
    // product
    Route::get('product/getData', [ProductController::class, 'getData'])->name('product.getData');
    Route::resource('product', ProductController::class);
    // Quotation
    Route::get('quotation/getData', [QuotationController::class,'getData'])->name('quotation.getData');
    Route::get('quotation/productData', [QuotationController::class,'productData'])->name('quotation.productData');
//    Route::get('quotation/delete/{id}', [QuotationController::class,'cleanIt']);


    Route::resource('quotation', QuotationController::class);

    //Quotation product




});

Route::group(['middleware' => ['role:employee', 'auth'], 'prefix' => 'employee'], function () {


});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
