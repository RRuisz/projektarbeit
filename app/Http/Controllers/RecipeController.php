<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
//     public function test() 
//     {
//         $test = Recipe::find(1);
//         $testarray = [];
//         foreach ($test->ingredient as $ingredient) {
//             $testarray[] = [
//                 'name' => $ingredient->name,
//                 'amount' => $ingredient->pivot->ingredient_amount
//             ];
//         }
//         return $testarray;
        // return $test->ingredient->pivot->ingredient_amount;
        // return $test->ingredient;
        // return view('test', compact('test'));
    // }

    public function single($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('informations.singlerecipe', compact('recipe'));
    }
}
