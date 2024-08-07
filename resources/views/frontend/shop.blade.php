@extends('frontend.layouts.template')

@section('home-content')
    <h1 class="text-center">Shop Page</h1>
    <h6 class="text-center"> All Products are visible here </h6>
    <hr />
    <div class="product">
        <div class="row">
            @foreach ($allProducts as $product)
                <div class="col-md-3 shadow my-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src={{$product->product_image}} class="img-fluid" style="width:80%;height:180px" />
                            <h4>{{$product->product_name}} </h4>
                            <p class="text-muted">Category: {{$product->product_category_name}} </p>
                            <p class="text-muted"> {{$product->product_short_des}} </p>
                            <p class="text-danger"> {{$product->price}} TK </p>
                            <button class="btn btn-primary" style="cursor: pointer">Add To Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection