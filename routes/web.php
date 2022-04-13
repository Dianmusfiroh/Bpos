<?php

use App\Http\Controllers\BanksController;
use App\Http\Controllers\ProduksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BiodatasController;
use App\Http\Controllers\Home;
use App\Http\Controllers\BoothsController;
use App\Http\Controllers\AdminBanksController;
use App\Http\Controllers\FeesController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
    Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('fee',FeesController::class);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('biodata',BiodatasController::class);
    Route::resource('adminBank',AdminBanksController::class);
    Route::get('fee/invoice',[FeesController::class, 'invoice']);
    Route::post('booth', 'BoothsController@detail')->name('detail');
    Route::resource('booth',BoothsController::class);
    Route::get('/downloadPdf/{id_bioadata}', [FeesController::class, 'downloadPdf'])->name('fee.downloadPdf');
    Route::post('/booth/search',[BoothsController::class,'showBooth'])->name('booth.search');
    // Route::get('/booth/updateStatus',[BoothsController::class,'update'])->name('updateStatus');
    Route::get('updateStatus',[BoothsController::class,'updateStatus'])->name('updateStatus');
    // Route::get('/booth/update',[FeesController::class, 'updateStatus']);
    // Route::get('/booth/search', 'BoothsController@search')->name('booth.search');
    // Route::get('/booth/update', [BoothsController::class, 'updateStatus'])->name('status');
    // Route::get('booth/update', 'BoothsController@updateStatus')->name('updateStatus');

});


