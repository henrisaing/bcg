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
Route::get('/groups', 'GroupController@groups');
Route::get('/group/new', 'GroupController@new');
Route::post('/group/create', 'GroupController@create');
Route::get('/group/{group}/edit', 'GroupController@editGroup');
Route::post('/group/{group}/update', 'GroupController@updateGroup');
Route::delete('/group/{group}/delete', 'GroupController@deleteGroup');

//api
Route::get('/api/getall', 'ApiController@getAll');
Route::get('/api/{group}', 'ApiController@group');
Route::get('/api/{group}/card', 'ApiController@getCard');
Route::get('/api/{group}/{name}/{freq}', 'ApiController@addItem');
Route::get('/api/{name}/{type}', 'ApiController@createGroup');
Route::get('/api/{item}/{name}/{freq}/update', 'ApiController@updateItem');

// items
Route::get('/group/{group}/items', 'ItemController@items');
Route::get('/group/{group}/items/new', 'ItemController@newItem');
Route::post('/group/{group}/items/create', 'ItemController@createItem');
Route::post('/item/{item}/update', 'ItemController@updateItem');
Route::get('/item/{item}/edit', 'ItemController@editItem');

// cards
Route::get('/group/{group}/generate', 'CardController@generateCard');
Route::get('group/{group}/gen', 'CardController@genCard');
Route::post('/card/new', 'CardController@saveCard');
Route::get('/card/{card}', 'CardController@userCard');
Route::post('/card/{card}/update', 'CardController@updateCard');
Route::get('/mycards', 'CardController@myCards');
Route::post('/card/{card}/ajax-post', 'CardController@ajaxPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function(){
  return view('test.test');
});

Route::post('/session', 'SessionController@theme');

//redirect sample, dirty, should be done on server level
Route::get('sample', function(){
  return redirect('group/9/generate');
});