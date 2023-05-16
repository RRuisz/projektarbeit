<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function new()
    {
        return view('recipes.newingredient');
    }

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

    public function all()
    {
        $ingredients = Ingredient::all();

        return view('recipes.ingredients', compact('ingredients'));
    }

    public function single($id)
    {
        $item = Ingredient::find($id);
        return view('recipes.singleingredient');
    }

}
