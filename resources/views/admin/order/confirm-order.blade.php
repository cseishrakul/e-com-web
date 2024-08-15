@extends('admin.layouts.template')
@section('content')
    <h2 class="text-center">Confirm Order</h2>
    <hr>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>User ID</td>
                        <td>
                            Shipping Info
                        </td>
                        <td>
                            Product ID
                        </td>
                        <td>
                            Quantity
                        </td>
                        <td>
                            Price
                        </td>
                        <td>
                            Action
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($confirm_orders as $order)
                        <tr>
                            <td>{{ $order->user_id }}</td>
                            <td>
                                <ul>
                                    <li> Phone Number -- {{ $order->shipping_phoneNumber }} </li>
                                    <li> Shipping City -- {{ $order->shipping_city }} </li>
                                    <li> Postal Code -- {{ $order->shipping_postalCode }} </li>
                                </ul>
                            </td>
                            <td>
                                {{ $order->product_id }}
                            </td>
                            <td>
                                {{ $order->quantity }}
                            </td>
                            <td>
                                {{ $order->total_price }}
                            </td>
                            <td>
                                <a href="{{route('viewInvoice',$order->id)}}" target="_blank" class="btn btn-primary">Invoice</a>
                                <a href="{{route('generateInvoice',$order->id)}}" class="btn btn-outline-warning">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
