<?php

use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PageController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/catagories', CatagoriesController::class)->middleware('auth');
Route::resource('/posts', PostsController::class);
Route::post('/posts/{id}/comments', [CommentsController::class, 'store']);
Route::resource('/tags', TagController::class);

