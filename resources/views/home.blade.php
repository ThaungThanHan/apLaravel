@extends('layout')

@section('content')
<div class="container">
<div class="card">
  <div class="card-header" style="text-align:center">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title" style="text-align:center">Special title treatment</h5>
    <p class="card-text">
    @foreach($data as $post)
        <div>
        <h5 class="card-title">{{$post->name}} </h5><br/>
        <p class="card-text">{{$post->description}}</p>
        <a href="#" class="btn btn-primary"> View </a><hr/>
        </div>
    @endforeach
    </p>
  </div>
</div>
</div>
@endsection
