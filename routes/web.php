<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkableController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomeController::class)->group(function(){
    Route::get('/home','index')->name('home');
    Route::get('/all','all')->name('all');
    Route::get('/archived','archived')->name('archived');
    Route::get('/draft','draft')->name('draft');
});

Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile','edit')->name('profile');
    Route::patch('/profile','update')->name('profile.update');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard','index')->name('dashboard');
});

Route::resource('post', PostController::class)->except('index');

Route::resource('comment', CommentController::class)->except('index','show','create');

Route::controller(MarkableController::class)->prefix('markables/')->group(function(){
    Route::post('like', 'toggleLike')->name('like.toggle');
    Route::post('favorite', 'toggleFavorite')->name('favorite.toggle');
});