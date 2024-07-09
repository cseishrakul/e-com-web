@extends('admin.layouts.template')
@section('page_title')
    All Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Product</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>S.desc</th>
                                    <th>L.desc</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>S.category</th>
                                    <th>slug</th>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>S.desc</th>
                                    <th>L.desc</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>S.category</th>
                                    <th>slug</th>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="" class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4 mr-auto">
                                                <a href="" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
