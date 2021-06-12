<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TechonologyController;
use App\Http\Controllers\CommentController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');


Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('technologies', TechonologyController::class)->names('admin.technologies');


Route::post('comments/{post}', [CommentController::class, 'store'])->name('admin.comments.store');
Route::post('comments/{post}/{comment}/edit', [CommentController::class, 'update'])->name('admin.comments.update');

Route::post('comments/video/{video}', [CommentController::class, 'storevideo'])->name('admin.comments.video.store');
Route::post('comments/video/{video}/{comment}/edit', [CommentController::class, 'updatevideo'])->name('admin.comments.video.update');



Route::resource('posts', PostController::class)->names('admin.posts');