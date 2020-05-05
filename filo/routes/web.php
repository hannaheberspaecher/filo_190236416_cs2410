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

Route::get('/home', 'HomeController@show')->name('home');

// assigns / URI to HomeController with index function
Route::get('/', 'HomeController@index')->name('welcome');

// routes required for user authentification
Auth::routes();

// routes all crud functions of Controllers
Route::resource('items','ItemController');
Route::resource('requests','RequestItemController');

// additional routes for ItemController
Route::get('jewellery', 'ItemController@jewellery')->name('jewellery');
Route::get('pet', 'ItemController@pet')->name('pet');
Route::get('phone', 'ItemController@phone')->name('phone');

Route::get('requested_items', 'ItemController@requested_items')->name('requested_items');



