<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CreateCommunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Talk_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adomincontroller;
use App\Http\Controllers\achieveController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;




Auth::routes();
Route::get('index', [testcontroller::class, 'index']);
Route::get('/talk', [Talk_Controller::class, 'talk']);
Route::get('/communities/{id}/messages', [Talk_Controller::class, 'getMessages']);
Route::post('/communities/{id}/messages', [Talk_Controller::class, 'postMessage']);
Route::get('/join_community/{id}', [CreateCommunityController::class, 'join_community']);
Route::post('/join_function', [CreateCommunityController::class, 'join_function'])->name('join_function');
Route::get('/post', [testcontroller::class, 'post']);
Route::get('/community', [CreateCommunityController::class, 'community']);
Route::post('/create_community', [CreateCommunityController::class, 'create_community'])->name('create_community');
Route::post('/post_action', [PostController::class, 'post_action'])->name('post_action');
Route::post('/achieve_action', [achieveController::class, 'achieve_action'])->name('achieve_action');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user_profile', [UserController::class, 'user_profile']);
Route::get('/posts/latest', [HomeController::class, 'latestPosts']);
Route::get('/user_achieve', [achieveController::class, 'achieve']);
Route::get('/adomin', [adomincontroller::class, 'adomin']);
Route::get('/achieve', [adomincontroller::class, 'achieve']);
Route::post('/achive_result_true', [AdominController::class, 'achive_result_true']);
Route::post('/achive_result_false', [AdominController::class, 'achive_result_false']);
Route::get('/aplication', [adomincontroller::class, 'aplication'])->name('aplication');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::post('/search_result', [SearchController::class, 'search_result'])->name('search_result');
Route::get('/other_profile/{id}', [UserController::class, 'other_profile'])->name('other_profile');
Route::get('/follow_function/{id}', [UserController::class, 'follow_function'])->name('follow_function');
Route::get('/follow_cancellation/{id}', [UserController::class, 'follow_cancellation'])->name('follow_cancellation');
Route::get('/genre', [adomincontroller::class, 'genre']);
Route::post('/genre/store', [adomincontroller::class, 'store'])->name('genre.store');
