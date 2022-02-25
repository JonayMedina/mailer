<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::group(['middleware' => ['admin']], function () {

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index-users');
            Route::get('/all', [UserController::class, 'all'])->name('all-users');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('show-user');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('update-user');
            Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete-user');
        });
    });
});
