<?php

use Illuminate\Support\Facades\Route;
use Module\blog\Http\Controllers\PostController;





Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::group(['middleware'=>'can:admin'],function (){
        Route::get('trash',[PostController::class,'trash'])->name('trash');
        Route::get('restore/{id}]',[PostController::class,'restore'])->name('restore');
        Route::get('changeStatus/{id}',[PostController::class,'changeStatus'])->name('changeStatus');
        Route::delete('{post}', [PostController::class, 'destroy'])->name('destroy');
    });

    Route::group(['middleware'=>'can:author'],function (){
        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::patch('{post}', [PostController::class, 'update'])->name('update');
        Route::get('{post}', [PostController::class, 'show'])->name('show');
    });

    Route::get('/', [PostController::class, 'index'])->name('index');



});

