<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory(){
        return view('admin.category.all-category');
    }
    public function addCategory(){
        return view('admin.category.add-category');
    }
}
