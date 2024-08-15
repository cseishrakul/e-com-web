@extends('frontend.layouts.template')

@section('home-content')
    <h2 class="text-center">Product Details</h2>
    <hr>
    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="images/single_4.jpg"><img src="{{ asset($product->product_image) }}" alt="">
                        </li>
                        <li data-image="images/single_2.jpg"><img src="{{ asset($product->product_image) }}" alt="">
                        </li>
                        <li data-image="images/single_3.jpg"><img src="{{ asset($product->product_image) }}" alt="">
                        </li>
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset($product->product_image) }}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category"> {{ $product->product_category_name }} </div>
                        <div class="product_name">{{ $product->product_name }}</div>
                        <div class="product_text">
                            <p> {{ $product->product_long_des }} </p>
                        </div>
                        <h6 class=""> Available Stock: {{ $product->quantity }} </h6>
                        <div class="order_info d-flex flex-row">
                            <form action="{{route('addProductToCart')}}" method="POST">
                                @csrf
                                <div class="product_price"> {{ $product->price }} Tk. </div>
                                <div class="button_container">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="number" name="quantity" min="1" class="form-control my-2" placeholder="1" required>
                                    </div>
                                    <input type="submit" value="Add To Cart" class="btn btn-outline-dark" style="cursor: pointer">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
