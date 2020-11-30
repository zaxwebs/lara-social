<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnfollowController;
use App\Http\Controllers\UnhighlightController;
use App\Http\Controllers\UnlikeController;
use App\Http\Controllers\WelcomeController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
    Route::get('/signup', [SignupController::class, 'index'])->name('signup');
    Route::get('/login', [LoginController::class, 'index'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
    Route::get('/home', [FeedController::class, 'index'])->name('home');
    Route::post('/post', [PostController::class, 'store'])->name('post');

    Route::get('/profile/{user:username}/followers', [FollowersController::class, 'index'])->name('followers');
    Route::get('/profile/{user:username}/following', [FollowingController::class, 'index'])->name('following');
    Route::get('/profile/{user:username?}', [ProfileController::class, 'show'])->name('profile');
    Route::post('/follow/{user:username}', [FollowController::class, 'store'])->name('follow');
    Route::delete('/unfollow/{user:username}', [UnfollowController::class, 'destroy'])->name('unfollow');
    Route::post('/highlight/{post}', [HighlightController::class, 'store'])->name('highlight');
    Route::delete('/unhighlight/{post}', [UnhighlightController::class, 'destroy'])->name('unhighlight');
    Route::post('/like/{post}', [LikeController::class, 'store'])->name('like');
    Route::delete('/unlike/{post}', [UnlikeController::class, 'destroy'])->name('unlike');
});
