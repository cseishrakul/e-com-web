<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allProducts = Product::latest()->take(8)->get();
        return view('frontend.home',compact('allProducts'));
    }
}
