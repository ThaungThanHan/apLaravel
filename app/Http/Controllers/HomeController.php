<?php
///php artisan make:controller HomeController --resource     /// created with this
namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\storePostRequest;
// use Illuminate\Support\Facades\Route;        // can't useo only one arguement in return redirect.

class HomeController extends Controller
{
    public function __construct(){              // can use middleware like this too. constructor method.
        $this->middleware('auth')->only('index','create');      // only tone pee ko kar chin tae function ko pl kar lo ya tal.
    }
     /* @return \Illuminate\Http\Response
     */
    public function index(Request $request)  // get method
    {   
        
        // Mail::raw('Hello World',function($msg){         // DUMMY MAIL...DEMO. for real, Mail::to
        //     $msg->to('kothaung@gmail.com')->subject('AP INDEX FUNCTION');
        // });  // env mar MAIL_MAILER mar log ko pygg for demo. pee yin log mar twr shr lo ya tal..mail poh lr m poh lar.
        
        $data = Post::where('user_id',auth()->id())->orderBy('id','desc')->get();
        return view("home",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    // get method, create form
    {
        $categories = Category::all();              // for selecting categories in Creating posts.
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */                 // Request class here is for getting instances of the user request. from there we can manipulate or vali.
    public function store(storePostRequest $request) // post, form submit data store. From data ka store htl yauk. For all submits.
    { 
        //dd($request->all());    // request so tae variable ka formdata phit..dd shows the data obj.
        // $post = new Post();
        // $post -> name = $request -> name;
        // $post -> description = $request -> description;
        // $post->save();

        // Post::create([                      // this replaces data assignment above. need fillable mass assignment in model.
        //     "name" => $request->name,       
        //     "description" => $request->description,
        //     "category_id" => $request->category,
        // ]);
        $validated = $request->validated();     // for validate(), html name="" must equal to column's name
        Post::create($validated + ['user_id'=>Auth::user()->id]);   // table mr user_id pr loh create yin post mr userid pr htae pyy tar...AUTH htl ka user_Id
        // Mail::to('kothaung@gmail.com')->send(new PostCreated()); //no need here becuz we use hooks
        return redirect('/posts')->with('status',config('flashmessage.messages.created'));
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)           // id tway tone pee show mal. Get method. No need to use eloquent find id. we use "Post $post" BTS action
    {   
        // if ($post->user_id != auth()->id()){        // manaually authorization filter
        //     abort(403);
        // }
        $this->authorize('view',$post);         // 'view' so tar PostPolicy ka func. $post yae data ko pass py lite tr PostPolicy ko.
        // $post = Post::findOrFail($id);    no need to do this cuz of (Post $post). Laravel does this line BTS.
        // findOrFail shows 404 error instead of NULL if id is unknown. findOrFail = find data with that ($id).
        return view('show',compact('post'));
        // dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)           // edit form, get method pl tone tal. Edit needs to get current data in the input.
    {                  //(Model_name variable) variable_name needs to be same as {wildcard} in route:list which is auto-generated.
        // $post = Post::findOrFail($id);
        if ($post->user_id != auth()->id()){
            abort(403);
        }
        $categories = Category::all();              // for selecting categories in Creating posts.
        return view('edit',compact('post','categories'));        // this function is just view for Edit. the below is backend.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePostRequest $request,Post $post)   // put method
    {   
         $validated = $request->validated();
         $post->update($validated); 
         return redirect('/posts')->with('status',config('flashmessage.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)        // delete
    {
        $post->delete();
        return redirect('/posts/')->with('status',config('flashmessage.messages.deleted'));
    }
}
