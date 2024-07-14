@extends('admin.layouts.template')
@section('page_title')
    Update Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Product</div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updateProduct') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value={{$product_info->id}}>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product_name" value="{{ $product_info->product_name }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Short Description</label>
                                    <textarea name="product_short_des" id="" class="form-control">{{ $product_info->product_short_des }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Long Description</label>
                                    <textarea name="product_long_des" id="" class="form-control">{{ $product_info->product_long_des }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="text" name="product_price" class="form-control"
                                        value="{{ $product_info->price }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="text" class="form-control"
                                        name="quantity"value="{{ $product_info->quantity }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
