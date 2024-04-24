<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\categoriesController@index', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/dashboard/add','App\Http\Controllers\categoriesController@create')->name('category.add');
    Route::post('/dashboard/addtask','App\Http\Controllers\TaskController@create')->name('task.add');
    Route::get('/dashboard','App\Http\Controllers\TaskController@index')->name('dashboard');
    Route::get('/dashboard/{id}/edit','App\Http\Controllers\TaskController@edit')->name('task.edit');
    Route::PUT('/dashboard/{id}/update','App\Http\Controllers\TaskController@update')->name('task.update');
    Route::delete('/dashboard/{id}/delete','App\Http\Controllers\TaskController@delete')->name('task.delete');
    Route::get('/dashboard/{id}/subtask','App\Http\Controllers\sub_taskController@index')->name('sub_task');
    Route::post('/subtask/{id}/add','App\Http\Controllers\sub_taskController@create')->name('sub_task.add');
    Route::get('/subtask/{id}/edit','App\Http\Controllers\sub_taskController@edit')->name('sub_task.edit');
    Route::PUT('/subtask/{id}/update','App\Http\Controllers\sub_taskController@update')->name('sub_task.update');
    Route::delete('/subtask/{id}/delete','App\Http\Controllers\sub_taskController@delete')->name('sub_task.delete');
});

