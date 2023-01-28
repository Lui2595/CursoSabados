<?php

use App\Http\Controllers\PostController;
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
    return view('index');
})->name('index');;

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/post', function () {
    return view('index');
})->name('post');;
Route::get('/contact', function () {
    return view('index');
})->name('contact');;

Auth::routes();


Route::prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource("post",PostController::class);
});
