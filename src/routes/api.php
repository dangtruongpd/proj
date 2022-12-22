<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;

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

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
], function () {
    // ADMIN - USER
    Route::group([
        'prefix' => '/users',
        'as' => 'user.'
    ], function() {
        Route::get('/', [UserController::class, 'index'])->name('list');
        // Route::post('/create', 'Api\Admin\UserController@store')->name('regist');
        // Route::get('/edit/{id}', 'Api\Admin\UserController@show')->name('detail');
        // Route::match(['put', 'patch'],'/edit/{id}', 'Api\Admin\UserController@update')->name('update');
        // Route::delete('/delete/{id}', 'Api\Admin\UserController@destroy')->name('remove');    
    });
});
