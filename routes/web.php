<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialiteController;
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

Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->where('provider', 'google');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callBack'])->where('provider', 'google');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/my-posts', [HomeController::class, 'myPosts'])->name('user.posts');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
});
