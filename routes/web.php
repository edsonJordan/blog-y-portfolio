<?php

use App\Http\Controllers\PagesController;
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
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/portfolio', [PagesController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return   view('dashboard');
})->name('dashboard');


