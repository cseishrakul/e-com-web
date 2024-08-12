@extends('frontend.layouts.template')

@section('home-content')
    @if (session()->has('message'))
        <div class="alert alert-success"> {{ session()->get('message') }} </div>
    @endif
    <h4 class="text-center">Shipping Address</h4>
    <hr>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card p-2">
                    <form action="{{route('addShippingAddress')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">City / Village</label>
                            <input type="text" name="city_name" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" id="">
                        </div>
                        <input type="submit" class="btn btn-primary w-100" value="Next">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
