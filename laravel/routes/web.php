<?php

use App\Http\Controllers\CommentsController;
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
Route::get('/post/{id}/{titulo}', [PostController::class, 'showPost'])->name('post.view');
Route::get('/post', [PostController::class, 'postList'])->name('post');;
Route::get('/contact', function () {
    return view('contact');
})->name('contact');;

Auth::routes();

//comentarios rutas
Route::post('/comment', [CommentsController::class, 'createFromPost']);;

Route::prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource("post",PostController::class);
    Route::post("post/uploadImage",[PostController::class,'uploadImage']);
});
