<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Aqui escribira su codigo un futuro maldito de laravel
|--------------------------------------------------------------------------
|
| Eres un campeón ¡¡¡
| No te rindas sigue solo falta poco¡¡¡¡
| Quieres ser un programador o no ?? sigue escribiendo codigo carajo ¡¡¡
|
*/
/* Ruta para el portafolio */
/* Route::get('/', function () {
    return view('welcome');
})->name('home'); */

/* Routes Pages */
Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/about', [PageController::class, 'about'])->name('about');


//Route::get('/blog', [PagesController::class, 'blog'])->name('blog');


/* Routes Blogs */
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');



/* Routes Blog - Post */
Route::get('/blog/post', [PostController::class, 'index'])->name('blog.post.index');
Route::get('/blog/post/{post}', [PostController::class, 'show'])->name('blog.post.show');
Route::get('/blog/post/category/{category}', [PostController::class, 'category'])->name('blog.post.category');
Route::get('/blog/post/technology/{technology}', [PostController::class, 'technology'])->name('blog.post.technology');


/* Routes Blog - Videos */
Route::get('/blog/video', [VideoController::class, 'index'])->name('blog.video.index');
Route::get('/blog/video/{video}', [VideoController::class, 'show'])->name('blog.video.show');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return   view('dashboard');
})->name('dashboard');


