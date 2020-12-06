@extends('layout')
@section('content')
<style>
  .form-error{
    border-color:red;
    border-width:.1rem;
  }
</style>

<div class="container" style="border:none">
<div class="card">
  <div class="card-header" style="text-align:center">
    Create New Post
  </div>
  <div class="card-body">
  <form action="/posts/" method="post">   <!-- action ny yar mar Route, method mar Ko kyite tae method -->
  @csrf     <!-- this takes care of the BTS of Token authentication stuff. Session htl token htae, see if its true -->
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control {{($errors->first('name') ? 'form-error' : '')}}" id="exampleInputEmail1" name="name"
     aria-describedby="emailHelp" placeholder="Enter name" value="{{old('name')}}">
     @error('name')   <!-- name of input goes in here -->
      <div class="alert alert-danger" style="margin-top:.5rem">{{ $message }}</div>
     @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea type="text" class="form-control {{($errors->first('description') ? 'form-error' : '')}}" id="exampleInputEmail1" name="description" rows="10" cols="50" 
    placeholder="Enter Description">{{old('description')}}</textarea> <!-- errors shi yin ae class ko tone..for style. first(errors'item) will take one record 1st-->
    @error('description')
      <div class="alert alert-danger" style="margin-top:.5rem">{{ $message }}</div>
    @enderror
  </div>
  <select name="category_id" id="" fullWidth>
    <option value="">Select Category</option>
    @foreach($categories as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endforeach
  </select>
  @error('category')
      <div class="alert alert-danger" style="margin-top:.5rem">{{ $message }}</div>
  @enderror
  <hr/>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/posts" class="btn btn-success"> Back </a>
</form>
  </div>
</div>
</div>
@endsection