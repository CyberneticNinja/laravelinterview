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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  Route::get('home', 'HomeController@index')->name('home');

  Route::get('list/delete/{id}','UserListController@deletelist')->where(['id' => '[0-9]+']);
  Route::get('createlist','UserListController@showcreateList')->name('showcreateList');
  Route::post('createlist','UserListController@createList');

  Route::get('list/update/{id}','UserListController@showUpdateForm')->where(['id' => '[0-9]+']);
  Route::patch('list/update','UserListController@updatelist')->name('updatelist');
});


Route::get('/test',function(){
  // return 'We are here successfully';
  return view('test');
})->name('test');
