<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function category(){
        return view('frontend.category');
    }
    public function shop(){
        $allProducts = Product::get();
        return view('frontend.shop',compact('allProducts'));
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

    public function categoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id',$id)->latest()->get();
        return view('frontend.category',compact('category','products'));
    }
}
