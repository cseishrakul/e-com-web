<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.all-product', compact('products'));
    }
    public function addProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.product.add-product', compact('categories', 'subcategories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        $image = $request->file('product_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_image->move(public_path('product-Image'), $img_name);
        $img_url = 'product-Image/' . $img_name;

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->product_price,
            'product_category_name' => $category_name,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_subcategory_name' => $subcategory_name,
            'product_image' => $img_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name,)),
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);
        return redirect()->route("allProduct")->with('message', 'Product Added Successfully!');
    }
    public function editProduct($id)
    {
        $product_info = Product::findOrFail($id);
        return view('admin.product.edit-product', compact('product_info'));
    }

    public function updateProduct(Request $data)
    {
        $id = $data->id;
        $data->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
        ]);

        Product::findOrFail($id)->update([
            'product_name' => $data->product_name,
            'product_short_des' => $data->product_short_des,
            'product_long_des' => $data->product_long_des,
            'price' => $data->product_price,
            'quantity' => $data->quantity,
            'slug' => strtolower(str_replace(' ', '-', $data->product_name,)),
        ]);
        return redirect()->route("allProduct")->with('message', 'Product Updated Successfully!');
    }

    public function editImage($id)
    {
        $product_img = Product::findOrFail($id);
        return view('admin.product.edit-image', compact('product_img'));
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $id = $request->id;
        $image = $request->file('product_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_image->move(public_path('product-Image'), $img_name);
        $img_url = 'product-Image/' . $img_name;
        Product::findOrFail($id)->update([
            'product_image' => $img_url
        ]);
        return redirect()->route("allProduct")->with('message', 'Image Updated Successfully!');
    }

    public function deleteProduct($id)
    {
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcat_id)->decrement('product_count', 1);
        return redirect()->route("allProduct")->with('message', 'Product Deleted Successfully!');
    }
}
