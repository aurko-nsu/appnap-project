@extends('profile.frame')
@section('content')

<div class="row">
    <div class="col-md-9">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
            @foreach($images as $image)
            <div class="carousel-item active">
                <img src="{{url('product_images/'.$user->id.'/'.$product->id.'/'.$image->picture.'')}}" class="d-block w-50" alt="">
            </div>
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <h3>Product Detail</h3>
        <table class="table table-light">
            <tbody class="table-light">
                <tr class="table-light">
                    <td class="table-light">Name</td>
                    <td class="table-light">{{$product->name}}</td>
                </tr>
                <tr class="table-light">
                    <td class="table-light">Procuct Slug</td>
                    <td class="table-light">{{$product->slug}}</td>
                </tr>
                <tr class="table-light">
                    <td class="table-light">Category</td>
                    <td class="table-light">{{$product->category}}</td>
                </tr>
                <tr class="table-light">
                    <td class="table-light">Brand</td>
                    <td class="table-light">{{$product->brand}}</td>
                </tr>
                <tr class="table-light">
                    <td class="table-light">Price</td>
                    <td class="table-light">{{$product->price}}</td>
                </tr>
                <tr class="table-light">
                    <td class="table-light">Product Upload Date-Time</td>
                    <td class="table-light">{{date("d.m.Y" , strtotime($product->created_at))}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection