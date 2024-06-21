<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('index', [testcontroller::class, 'index']);
Route::get('/post', [testcontroller::class, 'post']);
Route::post('/post_action', [PostController::class, 'post_action']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
