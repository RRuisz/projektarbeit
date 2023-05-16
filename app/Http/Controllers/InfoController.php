<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category};

class InfoController extends Controller
{
    public function index()
    {
        $categorys = Category::all();

        return view('recipes.index', compact('categorys'));
    }

    public function category($id) 
    {
        $category = Category::find($id);
        return view('recipes.categorysingle', compact('category'));
    }
}
