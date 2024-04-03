<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/category', function () {
    return view('category/category');
});
Route::get('/task', function () {
    return view('category/task');
});
Route::get('/subtask', function () {
    return view('category/sub_task');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
