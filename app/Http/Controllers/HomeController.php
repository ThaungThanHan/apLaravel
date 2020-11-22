<?php

namespace App\Http\Controllers;             // Class T shi tae address.

use App\Models\Post;
use Illuminate\Http\Request;                // Useful Request feature.

class HomeController extends Controller
{
    public function index(){
        // $data = Post::orderBy('id',desc) -> get();   d lo myo kyite talo lote pee u lo ya..based on SQL. Go look at docu.
        // you can use where(condition) bla bla.
        $data = Post::all();// thats nice about eloquent. you can get data out of database anytime.
        // dd($data);
        return view('home',compact('data'));
    }
}
?>