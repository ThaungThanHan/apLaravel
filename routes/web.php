<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::resource('posts', HomeController::class);
// If you don't want "resource" to automatically set up your routes, you can set it urself with 
// Route::get('/',[ HomeController::class,'index']);