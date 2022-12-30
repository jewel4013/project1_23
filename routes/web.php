<?php

use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\searchController;
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


Route::resource('/catagories', CatagoriesController::class)->middleware(['auth', 'admin']);


Route::resource('/posts', PostsController::class); //--->Middleware used in controller.
Route::get('/posts/{post}/approve', [PostsController::class, 'approve'])->middleware('auth', 'admin');
Route::get('/posts/{post}/hangon', [PostsController::class, 'hangon'])->middleware('auth', 'admin');
Route::get('/posts/catagory/{catagory}', [searchController::class, 'searchCatagory']);


Route::post('/posts/{id}/comments', [CommentsController::class, 'store'])->middleware('auth');
Route::post('/posts/{id}/liked', [CommentsController::class, 'likeStore'])->middleware('auth');
Route::get('/comments/{comment}/liked', [CommentsController::class, 'commentLikeStore'])->middleware('auth');



Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('auth');
Route::post('/profile/edit', [ProfileController::class, 'update'])->middleware('auth');



Route::resource('/tags', TagController::class)->middleware(['auth', 'admin']);

