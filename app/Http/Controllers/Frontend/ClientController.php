<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function category(){
        return view('frontend.category');
    }
    public function shop(){
        return view('frontend.shop');
    }
    public function singleProduct(){
        return view('frontend.single-product');
    }
    public function addToCart(){
        return view('frontend.add-to-cart');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function userProfile(){
        return view('frontend.user-profile');
    }
}
