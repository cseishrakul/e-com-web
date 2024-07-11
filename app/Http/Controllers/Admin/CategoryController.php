<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.category.all-category', compact('categories'));
    }
    public function addCategory()
    {
        return view('admin.category.add-category');
    }

    // Category Send to Database
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);
        return redirect()->route('allCategory')->with('message', 'Category Added Successfully!');
    }

    public function editCategory($id)
    {
        $category_info = Category::findOrFail($id);
        return view('admin.category.edit-category', compact('category_info'));
    }

    public function updateCategory(Request $request){
        $category_id = $request->category_id;
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);
        return redirect()->route('allCategory')->with('message', 'Category Updated Successfully!');
    }

    public function deleteCategory($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('allCategory')->with('message', 'Category Deleted Successfully!');
    }
}
