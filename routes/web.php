<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|----------------------------------------------------------`----------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'AdminRight', 'prefix' => 'admin'], function () {
    Route::put('resorting', [CategoryController::class, 'resorting'])->name('resorting');
    Route::resource('category', CategoryController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('country', CountryController::class);
    Route::resource('episode', EpisodeController::class);
    Route::resource('movie', MovieController::class);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'Homepage')->name('Homepage');
    Route::get('/danh-muc/{slug}', 'show_list_movie')->where('name', '[A-Za-z]+')->name('category');
    Route::get('/the-loai/{slug}', 'show_list_movie')->where('name', '[A-Za-z]+')->name('genre');
    Route::get('/quoc-gia/{slug}', 'show_list_movie')->where('name', '[A-Za-z]+')->name('country');
    Route::get('/phim/{slug}', 'movie')->where('name', '[A-Za-z]+')->name('movie');
    Route::get('/xem-phim/{slug}', 'watch')->name('watch');
    Route::get('/episode', 'episode')->name('episode');
});

Auth::routes();
