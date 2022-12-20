@extends('profile.frame')
@section('content')
<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
    font-size: 3.5rem;
    }
}

.b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
}

.bi {
    vertical-align: -.125em;
    fill: currentColor;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}

.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}

.no-product-text{
  color: gray;
}
</style>


<div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @php
        $count = 0;
        @endphp
        @foreach ($product as $data)
        @php
        $count = $count + 1;
        @endphp
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{url('product_images/'.$user->id.'/'.$data->id.'/'.$data->picture.'')}}" class="bd-placeholder-img card-img-top" height="225"></img>
            <div class="card-body">
              <p class="card-text">{{$data->name}}</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">DETAIL</button>
                </div>
                <small class="text-muted">Price: ${{$data->price}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    @php
      if($count == 0) $no_text_display = '';
      else $no_text_display = 'none';
    @endphp
    <h3 class="text-center no-product-text" style="display: {{$no_text_display}}">No Product Available</h3>
</div>
</div>

@endsection