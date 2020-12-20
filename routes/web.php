<?php

use App\Test;
use App\Container;
use App\TestFacade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/',function(){
    return view('welcome');
    // $container = new Container();
    // $container->bind('test',function(){
    //     return new Test();
    // });
    // $test = $container->resolve('test');
    // dd($test->smth());  // Test.php htl ka function    
    // app()->bind('test',function(){                  // using laravel's original container
    //     return new Test('Thaung');
    // });
    // $test = resolve('test');    // Test service yae instance ko ya.

    // $test = resolve(App\Test::class);   // if Test class doesn't exists, error  
    // dd($test);
    // return TestFacade::execute();
    });
Route::resource('posts', HomeController::class);//->middleware(['auth']);  // sanctum lo m  tone lal ya. verified ll m lo cuz config/auth.php
Route::get('logout', [AuthController::class,'logout']);
// If you don't want "resource" to automatically set up your routes, you can set it urself with 
// Route::get('/',[ HomeController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/posts',[ HomeController::class,'index']);    // dashboard yauk yin HomeController htl ka index ko run
// without middleware, users can access anypages without authentication. Middleware lo chin tae Route:: ko middleware(['auth:sanctum', 'verified']) dr kat lite.