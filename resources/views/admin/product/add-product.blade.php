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
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product_name" placeholder="Product Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category" id="" class="form-control">
                                        <option value="">Select Category</option>
                                        <option value="">Beg</option>
                                        <option value="">Phone</option>
                                        <option value="">Laptop</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Subcategory</label>
                                    <select name="subcategory" id="" class="form-control">
                                        <option value="">Select Sub</option>
                                        <option value="">Beg</option>
                                        <option value="">Phone</option>
                                        <option value="">Laptop</option>
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
                                    <input type="text" name="peoduct_price" class="form-control" placeholder="Product Price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" name="image" placeholder="Product Image">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Slug</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Count</label>
                                    <input type="text" class="form-control" name="product_count" placeholder="Product Count">
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
