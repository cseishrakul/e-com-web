<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function allSubcategory()
    {
        $subcategories = Subcategory::latest()->get();
        return view('admin.category.subcategory.all-subcategory', compact('subcategories'));
    }
    public function addSubcategory()
    {
        $categories = Category::latest()->get();
        return view('admin.category.subcategory.add-subcategory', compact('categories'));
    }
    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name
        ]);
        Category::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('allSubcategory')->with('message', 'Subcategory Added Successfully!');
    }

    public function editSubcategory($id)
    {
        $subcategory_info = Subcategory::findOrFail($id);
        return view('admin.category.subcategory.edit-subcategory', compact('subcategory_info'));
    }

    public function updateSubcategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);
        $subcatid = $request->subcategory_id;
        Subcategory::findOrFail($subcatid)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);
        return redirect()->route('allSubcategory')->with('message', 'Subcategory Updated Successfully!');
    }

    public function deleteSubcategory($id){
        $cat_id = Subcategory::where('id',$id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::where('id',$cat_id)->decrement('subcategory_count',1);
        return redirect()->route('allSubcategory')->with('message', 'Subcategory Deleted Successfully!');
    }
}
