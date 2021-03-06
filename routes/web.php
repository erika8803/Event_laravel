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

Route::get('/', 'CalendarController@index');

Route::get('/events', 'EventsController@index');
Route::get('/events/add', 'EventsController@add');
Route::post('/events/add', 'EventsController@create');

Route::get('/events/edit', 'EventsController@edit');
Route::post('/events/edit', 'EventsController@update');
Route::get('/events/delete', 'EventsController@delete');

Route::get('/line', 'LineApiController@sendMessage');
Route::get('/linesend', 'LineApiController@pushSend');

// Route::group(['prefix' => 'user'], function() {
//     Route::get('/', 'Admin\NewsController@add')->middleware('auth');
// });
Auth::routes();

