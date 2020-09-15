<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',            [AuthController::class,'login']);
    Route::post('loginemail',       [AuthController::class,'loginemail']);
    Route::post('logout',           [AuthController::class,'logout']);
    Route::post('register',         [AuthController::class,'register']);
    Route::post('photo',            [AuthController::class,'photo']);
    Route::get('partir/{id}',       [AuthController::class,'destroy']);
    Route::post('refresh',          [AuthController::class,'refresh']);
    Route::post('user',             [AuthController::class,'user']);
    Route::post('edit',             [AuthController::class,'edit']);
    Route::post('montoken',         [AuthController::class,'usertoken']);
    Route::get('notifications',     'NotificationController@notification');
    Route::get('marques',           'MarqueController@index');

});
Route::group([

    'middleware' => 'api',
    'prefix' => 'services'

], function ($router) {

    Route::get('servicesfree',          'CarteController@free');
    Route::get('servicessilver',        'CarteController@silver');
    Route::get('servicesgold',          'CarteController@gold');
    Route::get('servicesplatinum',      'CarteController@platinum');
    Route::post('servicessourcription', 'CarteController@souscrire');
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'assurances'

], function ($router) {

    Route::post('assuranceAuto/save',   'AssuranceController@autosave');
    Route::post('assuranceMoto/save',   'AssuranceController@Motosave');
    Route::post('assuranceMaison/save', 'AssuranceController@maisonsave');
    Route::post('assuranceSante/save',  'AssuranceController@santesave');
    Route::post('fichiers',             'DocumentController@fichiers');
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'messages'

], function ($router) {

    Route::post('message/save', 'MessageController@save');
    Route::post('message',      'MessageController@index');
});

