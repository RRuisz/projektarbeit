<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function new()
    {
        return view('recipes.newcategory');
    }

    public function save(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        
        return redirect('admin');
    }
}
