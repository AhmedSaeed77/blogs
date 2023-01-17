<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\YoutubeController;
use Modules\Blog\Http\Controllers\PostController;
use Modules\Blog\Http\Controllers\CommentController;




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

Route::get('/valex', function () {
    return view('cp.index');
});

Route::get('/alerts', function () {
    return view('cp.alerts')->name('alerts');
});

      

       

Route::group(
    [
        'middleware' => ['auth']
    ], function () {

        Route::get('/post', [PostController::class, 'index'])->name('index');
        Route::get('/stroe', [PostController::class, 'add'])->name('post.add');
        Route::post('/stroe', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('/post/{id}', [PostController::class, 'show'])->name('post.showcomment');

        Route::get('/addcomment/{post_id}', [PostController::class, 'add_comment'])->name('post.add_comment');
        Route::get('/deletecomment/{id}', [CommentController::class, 'delete'])->name('post.delete_comment');

        Route::get('/download/{id}', [PostController::class, 'download'])->name('post.download');
    });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify'=>true ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/youtube', [YoutubeController::class, 'getVideo']);

Route::get('/{page}', [AdminController::class, 'index']);
