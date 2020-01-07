<?php

use Illuminate\Http\Request;

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

Route::prefix('sk')->group(function() {
    Route::get('version', function() {
        return 'this is version v1';
    })->name('version');

    Route::post('getdata', 'GetDataController@index');
    Route::post('gettopdata', 'GetDataController@getTop');
});
