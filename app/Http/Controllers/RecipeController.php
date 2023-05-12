<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function test() 
    {
        $zutat = Recipe::find(1);
        return $zutat->ingredient_amount;
    }
}
