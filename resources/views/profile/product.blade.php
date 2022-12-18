@extends('profile.frame')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card" style="width: 18rem;">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">
                    <table class="table table-primary">
                        <tbody class="table-primary">
                            <tr class="table-primary">
                                <td class="table-primary">Brand: {{$product->brand}}</td>
                                <td class="table-primary">Brand: {{$product->price}}</td>
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