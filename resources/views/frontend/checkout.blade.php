@extends('frontend.layouts.template')

@section('home-content')
    <h4 class="text-center">Checkout Page</h4>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="card p-4">
                <h6>Phone Number -- {{ $shipping_address->phone_number }} </h6>
                <h6>City Name -- {{ $shipping_address->city_name }} </h6>
                <h6>Postal Code -- {{ $shipping_address->postal_code }} </h6>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
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
                            @endphp
                            <td>{{ $product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                        @php
                            $total = $total + $item->price;
                        @endphp
                    @endforeach

                </tbody>
            </table>
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('placeOrder')}}" method="POST">
                        @csrf
                        <input type="submit" value="Cash On Delivery" class="btn btn-primary" style="cursor: pointer">
                    </form>
                </div>
                <div class="col-md-2">
                    <a href="{{route('payment')}}" class="btn btn-warning">Online Pay</a>
                </div>
                <div class="col-md-2">
                    <form action="">
                        <input type="submit" value="Cancle Order" class="btn btn-danger" style="cursor: pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
