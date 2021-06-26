<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PhotosController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;

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
    return view('/home');
});

Route::get(
    '/photos/search',
    [PhotosController::class, 'search']
);

Route::resources([
    'photos'=> PhotosController::class,
    'categories' => CategoriesController::class,
    'users' => UsersController::class,
    'comments' => CommentsController::class,
]);

// Route::resource('/comments', CommentsController::class);
// Route::resource('/categories', CategoriesController::class);
// Route::resource('/users', UsersController::class);
// Route::resource('/roles', RolesController::class);

Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin');

Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'isAdmin',
        'as' => 'admin',
    ], function (){

    });
});


Route::get('/user/{id}/photos', [UsersController::class, 'photos']);

Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

