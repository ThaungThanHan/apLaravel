@extends('layout')

@section('content')
<div class="container" style="border:none">
<div class="card">
  <div class="card-header" style="text-align:center">
    Edit Post
  </div>
  <div class="card-body">
  <form action="/posts/{{$post->id}}" method="post">   <!-- action ny yar mar Route, method mar Ko kyite tae method -->
  @csrf     <!-- this takes care of the BTS of Token authentication stuff. Session htl token htae, see if its true -->
  @method('PUT')                <!-- has to clarify it here. Cuz its post method but the case is update( put, patch ) -->
  @if ($errors->any())                                              <!-- combined error display -->
    <div class="alert alert-danger" style="background-color:pink">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input value="{{old('name',$post->name)}}" type="text" class="form-control" id="exampleInputEmail1" name="name"
     aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea type="text" class="form-control" id="exampleInputEmail1" name="description" rows="10" cols="50"  
    >{{old('description',$post->description)}}</textarea>
    <!-- textarea, value apyin mar-->
  </div>
  <select name="category_id" id="" fullWidth>
    <option value="">Select Category</option>
    @foreach($categories as $cat)
      <option value="{{$cat->id}}" {{$cat->id == $post->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/posts" class="btn btn-success"> Back </a>
</form>
  </div>
</div>
</div>
@endsection