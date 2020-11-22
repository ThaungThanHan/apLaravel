<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/',[HomeController::class, 'index']);
// Route::get('/', function () {
//     $data=[
//         'home_key'=>'home_value',
//     ];
//     return view('home',compact('data'));
// });
 
// Route::get('/contact', function () {
//     $data=[
//         'contact_key'=>'contact_value',
//     ];
//     return view('contact',compact('data'));
// }); 
// Route::get('/about', function () {
//     $data=[
//         'about_key'=>'about_value',
//     ];
//     return view('about',compact('data'));
// });

// Route::get('contact',function(){             // passing in data for view;
//     $data  = "<script>alert('boom')</script>";
//     return view('contact',['data'=>$data]); //passing data to Views.
// });

// Route::get('contact/{name}',function($name){     // its called route wildcard. params to be exact. Function ka name ko phann
//     // $data  = request('name');      no need cuz. its already request in the get(); phann pee return pyn lote
//     return $name;
//     return view('contact',['data'=>$data]); //passing data to Views.
// });