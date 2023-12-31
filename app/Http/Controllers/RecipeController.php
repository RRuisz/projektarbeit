<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth};
use App\Models\Recipe;

class RecipeController extends Controller
{

    /**
     * Gets a Single recipe from Database
     * 
     * @param int $id
     * @return view, $recipe
     */
    public function single($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.singlerecipe', compact('recipe'));
    }

    /**
     * View for new recipe form
     * 
     * @return view
     */
    public function new() 
    {
        return view('recipes.newrecipe');
    }

    /**
     * Save route for new Recipe
     * Attaches each ingredient to the recipe
     * 
     * @param Request $request
     * @return redirect single recipe view
     */
    public function save(Request $request)
    {
        $combinedData = [];
        for($i = 0; $i < count($request->ingredient); $i++){
            $ingredientId = $request->ingredient[$i];
            $ingredientAmount = $request->ingredientAmount[$i];
            
            $combinedData[] = [
                'ingredient_id' => $ingredientId,
                'amount' => $ingredientAmount,
            ];
        }
        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->user_id = Auth::id();
        $recipe->category_id = 1;
        $recipe->cost = $request->cost;
        $recipe->save();

        foreach($combinedData as $data){
            $recipe->ingredient()->attach($data['ingredient_id'], ['ingredient_amount' => $data['amount']]);

        }

        return redirect()->route('recipe.single', $recipe->id);
    }
}
