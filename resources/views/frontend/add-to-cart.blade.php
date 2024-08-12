@extends('frontend.layouts.template')

@section('home-content')
    @if (session()->has('message'))
        <div class="alert alert-success"> {{ session()->get('message') }} </div>
    @endif
    <h2 class="text-center">Cart Page</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value(
                                        'product_name',
                                    );
                                    $img = App\Models\Product::where('id', $item->product_id)->value('product_image');
                                @endphp
                                <td>
                                    <img src="{{ asset($img) }}" class="img-fluid" style="width: 100px;height:100px"
                                        alt="">
                                </td>
                                <td>{{ $product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="{{ route('removeCartItem', $item->id) }}" class="btn btn-warning">Remove</a>
                                </td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <th> Total Price </th>
                            <td> {{ $total }} Tk. </td>
                            <td>
                                @if ($total <= 0)
                                    <a href="" class="btn btn-outline-primary disabled">Checkout Now</a>
                                @else
                                    <a href="{{route('shippingAddress')}}" class="btn btn-outline-primary">Checkout Now</a>
                                @endif

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
