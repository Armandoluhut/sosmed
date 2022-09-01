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

Route::controller(RegisterController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::prefix('/register')->group(function () {
            Route::get('/', 'register');
            Route::post('/', 'registerUseer');
        });
    });
});
// Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::controller(LoginController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::prefix('/login')->group(function () {
            Route::get('/', 'login')->name('login');
            Route::post('/', 'loginUser');
        });
    });
    Route::get('/logout', 'logout')->middleware('auth');
});
//Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');


Route::controller(PostController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::prefix('/post')->group(function () {
            Route::post('/', 'postCreate');
            Route::get('/edit/{post:id}', 'post');
            Route::post('/edit/{post:id}', 'postEdit');
            Route::get('/delete/{post:id}', 'postDelete');
        });
    });
});
// Route::post('/post', [PostController::class, 'postCreate'])->middleware('auth');
// Route::get('/post/edit/{post:id}', [PostController::class, 'post'])->middleware('auth');


Route::controller(CommentController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::prefix('/comment')->group(function () {
            Route::post('/{post:id}', 'commentCreate');
            Route::get('/edit/{comment:id}', 'comment');
            Route::post('/edit/{comment:id}', 'commentEdit');
            Route::get('/delete/{comment:id}', 'commentDelete');
        });
    });
});

// Route::post('/comment/{post:id}', [CommentController::class, 'commentCreate'])->middleware('auth');
// Route::get('/comment/edit/{comment:id}', [CommentController::class, 'comment'])->middleware('auth');
// Route::post('comment/edit/{comment:id}', [CommentController::class, 'commentEdit'])->middleware('auth');
// Route::get('/comment/delete/{comment:id}', [CommentController::class, 'commentDelete`'])->middleware('auth');
