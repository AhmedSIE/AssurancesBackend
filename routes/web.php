<?php

use App\Http\Controllers\Voyager\VoyagerController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/',                                     [VoyagerController::class,'index']);
    Route::get('/dashboard',                            [VoyagerController::class,'index'])->name('voyager.dashboard');
    Route::get('/back-logout',                          [VoyagerController::class,'logout'])->name('logout');

    Route::get('/login',                                [VoyagerController::class,'login'])->name('voyager.login');

});





