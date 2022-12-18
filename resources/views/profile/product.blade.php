@extends('profile.frame')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card" style="width: 18rem;">
            <img src="/product_image/{{$user->id}}/{{$product[0]->id}}/{{json_decode($product[3]->picture)}}" class="card-img-top" alt="product picture">
            <div class="card-body">
                <h5 class="card-title">{{$product[0]->name}}</h5>
                <p class="card-text">
                    <table class="table table-primary">
                        <tbody class="table-primary">
                            <tr class="table-primary">
                                <td class="table-primary">Brand: {{$product[0]->brand}}</td>
                                <td class="table-primary">Price: {{$product[0]->price}}</td>
                            </tr>
                        </tbody>
                    </table>
                </p>
                <a href="#" class="btn btn-primary" style="float: right;">Detail</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        
    </div>
</div>

@endsection