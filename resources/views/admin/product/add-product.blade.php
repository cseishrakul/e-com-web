@extends('admin.layouts.template')
@section('page_title')
    Add Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Product</div>
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
                    <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product_name" placeholder="Product Name"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="product_category_id" id="" class="form-control">
                                        <option value="">Categories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Subcategory</label>
                                    <select name="product_subcategory_id" id="" class="form-control">
                                        <option value="">Subcategories</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"> {{ $subcategory->subcategory_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Short Description</label>
                                    <textarea name="product_short_des" placeholder="Product Short Description" id="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Long Description</label>
                                    <textarea name="product_long_des" placeholder="Product Long Description" id="" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="text" name="product_price" class="form-control"
                                        placeholder="Product Price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" name="product_image" placeholder="Product Image">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="text" class="form-control" name="quantity"
                                        placeholder="Product Quantity">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Product" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
