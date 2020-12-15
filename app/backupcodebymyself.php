HomeController
// dd(auth() -> id());               // auth() function ka "Auth::" facade asrr tone tar thu thu pl. Authenticated phit tae kg
        // $data = Post::where('user_id',auth()->id())->orderBy('id','desc')-> get(); // check docu for more! orderBy teams. orderBy doh tone dml so get() py ya.
        // $data = Post::all();        // imported Model Post. Just the same as week 3 but with RESTful reqs.
        // $posts = Post::pluck('description');
        // // $data = [];
        // // foreach($posts as $post){
        //     dd($posts);
        // $data = Post::where('user_id',auth()->id())->orderBy('id','desc') -> get(); 
        // dd(config('aprogrammer.info.second'));// config folder htl ka mail.php htl ka. .env mar assign twr lote mha por mal or null.
        // $request->session()->flash('status','Task was successful');
