<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/module/employee/dashboard', 'EmployeeModuleController@index')->name('employee.home');
Route::get('/module/employee/register', 'EmployeeModuleController@create')->name('employee.create');
Route::post('/module/employee/store', 'EmployeeModuleController@store')->name('employee.store');
Route::get('/module/employee/edit/{employee}', 'EmployeeModuleController@edit')->name('employee.edit');
Route::post('/module/employee/edit/{employee}', 'EmployeeModuleController@update')->name('employee.update');