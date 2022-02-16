<?php

use App\Http\Controllers\BanksController;
use App\Http\Controllers\ProduksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BiodatasController;
use App\Http\Controllers\Home;
use App\Http\Controllers\BoothsController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     Route::resource('dashboard',Home::class);

//     return view('dashboard');



// });
Route::resource('/',Home::class);

// Route::group(['middleware' => ['auth', 'verified']], function () {
    // Route::resource('bank', 'BanksController');
    Route::resource('biodata',BiodatasController::class);
    Route::resource('order',OrdersController::class);
    Route::resource('booth',BoothsController::class);
    // Route::get('seller/{id}','SellersController@show')->name('show');
    // Route::get('booth',[BoothsController::class,'show']);

    Route::resource('account',AccountsController::class);


    // Route::get('/bank', [BanksController::class, 'index']);
    // Route::get('/bank', 'BanksController@index')->name('home');

// });
