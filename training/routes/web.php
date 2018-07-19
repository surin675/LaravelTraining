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

/* Employee */
Route::resource('employees', 'EmployeeController');
Route::get('employees/{id}/tasks', 'EmployeeController@addEmployeeTask');
Route::post('employees/storeEmployeeTask', 'EmployeeController@storeEmployeeTask');

/* Task */
Route::resource('tasks', 'TaskController');
Route::get('tasks/{id}/employees', 'TaskController@assignTaskToEmployee');
Route::post('tasks/storeEmployeeTask', 'TaskController@storeEmployeeTask');