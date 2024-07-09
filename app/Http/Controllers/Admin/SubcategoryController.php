<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function allSubcategory(){
        return view('admin.category.subcategory.all-subcategory');
    }
    public function addSubcategory(){
        return view('admin.category.subcategory.add-subcategory');
    }
}
