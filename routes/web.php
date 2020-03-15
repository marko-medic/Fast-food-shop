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

Route::get('/', 'PageController@index');
Auth::routes();

Route::get('/dashboard', 'PageController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/foods', 'FoodController@index')->name('foods.index');
Route::get('/foods/create', 'FoodController@create')->name('foods.create')->middleware("auth");
Route::post('/foods', 'FoodController@store')->middleware("auth");
Route::get('/foods/edit/{id}', 'FoodController@edit')->name("foods.edit")->middleware("auth");
Route::put('/foods/{id}', 'FoodController@update')->middleware("auth"); // moze ali i ne mora da ima name..
Route::delete('/foods/{id}', 'FoodController@destroy')->name("foods.destroy")->middleware("auth");
Route::get('/foods/{id}', 'FoodController@show')->name('foods.show');
