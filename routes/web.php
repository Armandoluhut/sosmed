<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;


use function PHPUnit\Framework\returnSelf;

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
    return view('home', [
        'posts' => Post::latest()->get(),
        'comments' => Comment::latest()->get(),
    ]);
})->middleware('auth');


Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'registerUser'])->middleware('guest');

Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'loginUser'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');



Route::post('/post', [PostController::class, 'postCreate'])->middleware('auth');

Route::get('/post/edit/{post:id}', [PostController::class, 'post'])->middleware('auth');

Route::post('post/edit/{post:id}', [PostController::class, 'postEdit'])->middleware('auth');

Route::get('/post/delete/{post:id}', [PostController::class, 'postDelete'])->middleware('auth');



Route::post('/comment/{post:id}', [CommentController::class, 'commentCreate'])->middleware('auth');

Route::get('/comment/edit/{comment:id}', [CommentController::class, 'comment'])->middleware('auth');

Route::post('comment/edit/{comment:id}', [CommentController::class, 'commentEdit'])->middleware('auth');

Route::get('/comment/delete/{comment:id}', [CommentController::class, 'commentDelete`'])->middleware('auth');
