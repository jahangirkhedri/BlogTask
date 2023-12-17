<?php

use Illuminate\Support\Facades\Route;
use Module\blog\Http\Controllers\PostController;

Route::get('posts/trash',[PostController::class,'trash'])->name('posts.trash');
Route::get('posts/restore/{id}]',[PostController::class,'restore'])->name('posts.restore');
Route::get('posts/changeStatus/{id}',[PostController::class,'changeStatus'])->name('posts.changeStatus');
Route::resource('posts',PostController::class);
