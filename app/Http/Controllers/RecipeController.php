<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function test() 
    {
        $test = Recipe::find(1);
        return $test->ingredient;
        // return view('test', compact('test'));
    }
}
