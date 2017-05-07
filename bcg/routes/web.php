<?php

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

// groups
Route::get('/groups', 'HomeController@groups');
Route::get('/group/new', 'HomeController@new');
Route::post('/group/create', 'HomeController@create');

// items
Route::get('/group/{group}/items', 'HomeController@items');
Route::get('/group/{group}/items/new', 'HomeController@newItem');
Route::post('/group/{group}/items/create', 'HomeController@createItem');

// cards
Route::get('/group/{group}/generate', 'HomeController@generateCard');
Route::get('group/{group}/gen', 'HomeController@genCard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
