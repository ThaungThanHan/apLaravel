@extends('layout')

@section('content')
<div class="container" style="border:none">
<div class="card">
  <div class="card-header" style="text-align:center">
    Post Contents
  </div>
  <div class="card-body">
        <div>   <!-- $post is from compact('post');
            <h5 class="card-title">{{$post->name}} </h5><br/>    <!-- if find() tone loh null, phit yin d mar error tat -->
            <p class="card-text">{{$post->description}}</p>
        </div><hr>
        <div>
            <a href="/posts/" class="btn btn-success" style="margin-bottom:.5rem"> Back </a>
        </div>
  </div>
</div>
@endsection