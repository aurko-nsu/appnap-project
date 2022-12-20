@extends('profile.frame')
@section('content')

<style>
form{
    width: 60%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 2px solid gray;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 10px;
    padding: 20px;
}
</style>
<div class="form-div">
<form method="POST" action="{{route('add-product')}}" enctype="multipart/form-data">
    <h3 class="heading">Add your products</h3>
    {{view('session_alert')}}
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" placeholder="Chocolate or Candy" value="{{old('name')}}">
        <span class="text-danger">@error('name'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="slug" class="form-label">Product Slug</label>
        <input type="text" name="slug" class="form-control" placeholder="abc-def" value="{{old('slug')}}">
        <span class="text-danger">@error('slug'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="price" class="form-label">Product Price</label>
        <input type="text" name="price" class="form-control" placeholder="250.00" value="{{old('price')}}">
        <span class="text-danger">@error('price'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="category" class="form-label">Product Category</label>
        <input type="text" name="category" class="form-control" placeholder="stationary, fruits, household" value="{{old('category')}}">
        <span class="text-danger">@error('category'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="brand" class="form-label">Product Brand</label>
        <input type="text" name="brand" class="form-control" placeholder="Kitkat, Faber-Castell" value="{{old('brand')}}">
        <span class="text-danger">@error('brand'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="images" class="form-label">Product Picture</label>
        <input type="file" name="images[]" multiple class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <span class="text-danger">@error('images'){{$message}}@enderror</span>
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-success">Add Product</button>
</form>
</div>
@endsection