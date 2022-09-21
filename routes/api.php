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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// creo la route per per la visione di tutti i post con vuejs
Route::get('/posts', 'Api\PostController@index');

// creo la route per la visione dei singoli post
Route::get('/posts/{slug}', 'Api\PostController@show');

// creo una route per visualizzare la funzione store() di LeadController
Route::post('/leads', 'Api\LeadController@store');
