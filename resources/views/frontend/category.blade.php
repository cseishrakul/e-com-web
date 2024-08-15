@extends('frontend.layouts.template')

@section('home-content')
    <h1 class="text-center">{{ $category->category_name}}</h1>
    <h6 class="text-center"> All Products are visible here from {{$category->category_name}} category Total Products {{$category->product_count}}</h6>
    <hr />
    <div class="product">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 shadow my-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src={{asset($product->product_image)}} alt={{$category->category_name}} class="img-fluid" style="width:80%;height:180px" />
                            <h4>{{$product->product_name}} </h4>
                            <p class="text-muted">Category: {{$product->product_category_name}} </p>
                            <p class="text-muted"> {{$product->product_short_des}} </p>
                            <p class="text-danger"> {{$product->price}} TK </p>
                            <a href="{{route('singleProduct',[$product->id,$product->slug])}}" class="btn btn-outline-primary"> See More </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection