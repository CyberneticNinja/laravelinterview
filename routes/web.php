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
  //home
  Route::get('home', 'HomeController@index')->name('home');

  //lists
  Route::get('list/delete/{id}','UserListController@showdeleteConfirmationForm')->where(['id' => '[0-9]+']);
  Route::get('list/create','UserListController@showcreateList')->name('showcreateList');
  Route::post('list/create','UserListController@createList');
  Route::get('list/update/{id}','UserListController@showUpdateForm')->where(['id' => '[0-9]+']);
  Route::patch('list/update','UserListController@updatelist')->name('updatelist');
  Route::delete('list/delete','UserListController@deleteList');

  //tasks
  Route::get('list/{id}/tasks','TaskController@showTasks')->where(['id' => '[0-9]+']);
  Route::get('list/{id}/tasks/create','TaskController@showcreateTaskForm')->where(['id' => '[0-9]+']);
  Route::post('list/tasks/create','TaskController@createTask');
  Route::get('task/{id}/update','TaskController@showupdateTaskForm')->where(['id' => '[0-9]+']);
  Route::patch('task/update','TaskController@updateTask');
  Route::get('task/{id}/delete','TaskController@showdeleteConfirmationForm');
  Route::delete('task/delete','TaskController@deleteTask');
});


Route::get('/test',function(){
  // return 'We are here successfully';
  return view('test');
})->name('test');
