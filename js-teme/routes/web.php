<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CreateCommunityController;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::get('index', [testcontroller::class, 'index']);
Route::get('/post', [testcontroller::class, 'post']);
Route::get('/community', [CreateCommunityController::class, 'community']);
Route::post('/create_community', [CreateCommunityController::class, 'create_community'])->name('create_community');
Route::post('/post_action', [PostController::class, 'post_action'])->name('post_action');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
