<?php

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
//     return view('welcome');
// });

Auth::routes();

// regole per la parte admin Admin
Route::middleware('auth')
->prefix('admin')
->namespace('Admin')
// nel name c'è il punto finale
->name('admin.')
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
});

// route per la home della pagina publica
Route::get('/' , function(){
    return view('guest.home');
});
