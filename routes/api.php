<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/notebook/{id}', 'App\Http\Controllers\Api\ContactController@show')->name('contact.show');
Route::delete('/notebook/{id}', 'App\Http\Controllers\Api\ContactController@destroy')->name('contact.destroy');
Route::post('/notebook/{id}', 'App\Http\Controllers\Api\ContactController@update')->name('contact.update');

Route::get('/notebook', 'App\Http\Controllers\Api\ContactController@index')->name('contacts.index');

Route::post('/notebook', 'App\Http\Controllers\Api\ContactController@store')->name('contact.store');
      