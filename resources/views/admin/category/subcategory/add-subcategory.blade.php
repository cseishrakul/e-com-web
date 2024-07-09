@extends('admin.layouts.template')
@section('page_title')
    Add Subcategory
@endsection
@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card my-5">
            <div class="card-header">
                <div class="card-title">Add Subcategory</div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Subcategory Name</label>
                        <input type="text" name="subcategory_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="" id="" class="form-control">
                            <option value="">Beg</option>
                            <option value="">Phone</option>
                            <option value="">Laptop</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Subcategory" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection