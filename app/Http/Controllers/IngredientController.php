<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * View to create an new Ingredient
     * 
     * @return view
     */
    public function new()
    {
        return view('recipes.newingredient');
    }

    /**
     * saves the new Ingredient to database
     * 
     * @param Request $request
     * @return Redirect to all Ingredients
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'unique:ingredients'
        ]);
        $ingredient = new Ingredient;
        $ingredient->name = $request->name;
        $ingredient->price = $request->price;
        $ingredient->amount = $request->amount;
        $ingredient->measure = $request->measure;
        $ingredient->save();

        return redirect()->route('ingredient.all');

    }

    /**
     * Gets all Ingredients from database
     * 
     * @return view & $ingredients
     */
    public function all()
    {
        $ingredients = Ingredient::all();

        return view('recipes.ingredients', compact('ingredients'));
    }

    // TODO: NOT WORKING YET!!
    public function single($id)
    {
        $item = Ingredient::find($id);
        return view('recipes.singleingredient');
    }

}
