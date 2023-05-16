<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category};

class InfoController extends Controller
{
    /**
     * Gets view for Recipe Index side and gets all Categorys from database
     * 
     * @return view & $category
     */
    public function index()
    {
        $categorys = Category::all();

        return view('recipes.index', compact('categorys'));
    }

    /**
     * Gets a single Category
     * 
     * @return view & $category
     */
    public function category($id) 
    {
        $category = Category::find($id);
        return view('recipes.categorysingle', compact('category'));
    }
}
