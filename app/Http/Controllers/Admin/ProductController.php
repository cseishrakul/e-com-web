<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProduct(){
        return view('admin.product.all-product');
    }
    public function addProduct(){
        return view('admin.product.add-product');
    }
}
