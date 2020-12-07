@extends('layout')

@section('content')
<div class="container" style="border:none">
<a href="/posts/create/" class="btn btn-success" style="margin-bottom:.5rem"> Create </a>
<a href="logout" class="btn btn-warning">Logout</a> <!-- <form> not needed becuz we have login path with AuthController.-->
<p> {{Auth::User()}} </p>
<div class="card">
  <div class="card-header" style="text-align:center">
    Contents
  </div>
  <div class="card-body">
    <h5 class="card-title" style="text-align:center">Special title treatment</h5>
    <p class="card-text">
    @foreach($data as $post)  <!--post taku chin si atwat  -->
        <div>
        <h5 class="card-title">{{$post->name}} </h5><br/>
        <p class="card-text">{{$post->description}}</p>
        <div class="form-row">
        <a href="/posts/{{$post -> id}}" class="btn btn-primary" style="height:40px; margin-right:1rem" > View </a> <!-- url paths twy ka route:list atine-->
        <a href="/posts/{{$post -> id}}/edit" class="btn btn-warning" style="height:40px; margin-right:1rem" > Edit </a>
        <form action='/posts/{{$post->id}}' method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"> Delete </button>
        </form>
        </div><hr/>
        </div>
    @endforeach
    </p>
  </div>
</div>
</div>
@endsection
