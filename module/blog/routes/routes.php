<?php

use Illuminate\Support\Facades\Route;
use Module\blog\Http\Controllers\PostController;

Route::resource('post',PostController::class);
