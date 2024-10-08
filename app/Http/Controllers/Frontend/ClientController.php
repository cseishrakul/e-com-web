<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Auth;

class ClientController extends Controller
{
    public function category()
    {
        return view('frontend.category');
    }
    public function shop()
    {
        $allProducts = Product::get();
        return view('frontend.shop', compact('allProducts'));
    }
    public function singleProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.single-product', compact('product'));
    }
    public function addToCart()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        return view('frontend.add-to-cart',compact('cart_items'));
    }
    public function checkout()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        $shipping_address = ShippingInfo::where('user_id',$userid)->first();
        return view('frontend.checkout',compact('cart_items','shipping_address'));
    }
    public function userProfile()
    {
        return view('frontend.user-profile');
    }

    public function categoryPage($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('frontend.category', compact('category', 'products'));
    }

    // Add to cart
    public function addProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price
        ]);
        return redirect()->route('addToCart')->with('message','Product added to the cart successfully!');
    }

    public function removeCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addToCart')->with('message','Product Removed Successfully!');
    }

    public function shippingAddress(){
        return view('frontend.shipping-address');
    }

    public function addShippingAddress(Request $request){
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' =>$request->phone_number,
            'city_name' =>$request->city_name,
            'postal_code' =>$request->postal_code,
        ]);
        return redirect()->route('checkout');
    }

    public function placeOrder(Request $request){
        $userid = Auth::id();
        $shipping_address = ShippingInfo::where('user_id',$userid)->first();
        $cart_items = Cart::where('user_id',$userid)->get();
        foreach($cart_items as $item){
            Order::insert([
                'user_id' => $userid,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city_name,
                'shipping_postalCode' => $shipping_address->postal_code,
                'product_id' =>$item->id,
                'quantity' => $item->quantity,
                'total_price' => $item->price
            ]);
            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }
        ShippingInfo::where('user_id',$userid)->first()->delete();
        return redirect()->route('pendingOrders')->with('message','Order Placed Successfully!');
    }

    public function pendingOrders(){
        return view('frontend.pending-order');
    }
}
