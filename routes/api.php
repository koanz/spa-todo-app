<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::get('/login', 'AuthController@index');
    //Route::get('/register', 'AuthController@register');
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

//Route::post('/register', 'AuthController@register');

Route::group(['middleware' => 'jwt.auth'], function ($router) {
    Route::get('/', 'ItemController@index');
    Route::post('/', 'ItemController@store');
    Route::patch('/{item}', 'ItemController@update');
    Route::delete('/{id}', 'ItemController@destroy');

    Route::get('/notes', 'NoteController@index');
    Route::post('/notes', 'NoteController@store');
    Route::post('/todos', 'TodoController@store');
});
