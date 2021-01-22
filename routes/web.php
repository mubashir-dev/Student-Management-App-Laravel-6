<?php


Route::get('/', 'Student\StudentController@index');
Route::get('/create','Student\StudentController@create');
Route::post('/create','Student\StudentController@store')->name('student.add');
Route::get('/edit/{id}','Student\StudentController@show');
Route::post('/edit','Student\StudentController@edit')->name('student.edit');
Route::get('/delete/{id}','Student\StudentController@delete');
Route::get('/view/{id}','Student\StudentController@view');

