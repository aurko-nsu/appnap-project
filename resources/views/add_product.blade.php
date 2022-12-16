<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Product Page || Profile</title>
</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="add_product">Add Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout">Logout</a>
            </li>
        </ul>
        <span class="navbar-text">
            Welcome {{$user->name}}
        </span>
        </div>
    </div>
</nav>

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
        <input type="file" name="images" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <span class="text-danger">@error('images'){{$message}}@enderror</span>
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-success">Add Product</button>
</form>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>