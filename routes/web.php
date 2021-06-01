<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\CommentController;

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
    return view('home');
});

// photos routes
Route::get('/photos', [PhotosController::class, 'index']);

// photo routes
Route::post('/photo', [PhotoController::class, 'create']);
Route::get('/photo/{id}',
    [PhotoController::class, 'show'])->where('id', '[0-9]+');
Route::get('/photo/{id}/edit', [PhotoController::class, 'edit']);
Route::post('/photo/{id}', [PhotoController::class, 'update']);
Route::delete('/photo/{id}', [PhotoController::class, 'delete']);

// comment routes
Route::post('/comment', [CommentController::class, 'create']);
Route::get('/comment/{id}', [ComCommentController::class, 'show']);
Route::get('/comment/{id}/edit', [CommentController::class, 'edit']);
Route::post('/comment/{id}', [CommentController::class, 'update']);
Route::delete('/comment/{id}', [CommentController::class, 'delete']);

Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

// users routes
// Route::get('/users', function(){ return view('users.index'); });

// user routes
Route::get('/user/{id}', function(){return view('user.index');});

