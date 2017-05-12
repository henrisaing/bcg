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
Route::get('/group/{group}/edit', 'HomeController@editGroup');
Route::post('/group/{group}/update', 'HomeController@updateGroup');
Route::delete('/group/{group}/delete', 'HomeController@deleteGroup');

// items
Route::get('/group/{group}/items', 'HomeController@items');
Route::get('/group/{group}/items/new', 'HomeController@newItem');
Route::post('/group/{group}/items/create', 'HomeController@createItem');
Route::post('/item/{item}/update', 'HomeController@updateItem');
Route::get('/item/{item}/edit', 'HomeController@editItem');

// cards
Route::get('/group/{group}/generate', 'HomeController@generateCard');
Route::get('group/{group}/gen', 'HomeController@genCard');
Route::post('/card/new', 'HomeController@saveCard');
Route::get('/card/{card}', 'HomeController@userCard');
Route::post('/card/{card}/update', 'HomeController@updateCard');
Route::get('/mycards', 'HomeController@myCards');
Route::post('/card/{card}/ajax-post', 'HomeController@ajaxPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function(){
  return view('test.test');
});
