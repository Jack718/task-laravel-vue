<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@welcome');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('projects','ProjectsController');
Route::get('tasks/charts',['as'=>'tasks.charts','uses'=>'TasksController@charts']);
Route::post('tasks/{id}/check',['as'=>'tasks.check','uses'=>'TasksController@check']);
Route::resource('tasks','TasksController');
Route::get('tasks/show','tasksController@show');

Route::post('tasks/{id}/steps/complete' , 'StepsController@completeAll');
Route::delete('tasks/{id}/steps/clear' , 'StepsController@clearCompleted');
Route::resource('tasks.steps','StepsController');