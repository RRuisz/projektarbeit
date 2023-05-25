<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Ingredient, Checklisttask, Department, Category, Recipe, Roster, Workingtime, Weekdays};
use Illuminate\Support\Facades\{DB, Auth};

class ApiController extends Controller
{

    /**
     * API for Member Site
     * @return $users = all users and departments
     */
    public function users()
    {
        $user = User::all();
        $department = Department::all();
        $users = [
            'users' => $user, 
            'department' => $department
        ];
        return $users;
    }

    /**
     * API for new Recipe site
     * 
     * @return $ingredient;
     */
    public function ingredients()
    {
        $ingredient = Ingredient::all();
        return $ingredient;
    }

    /**
     * API for recipe site
     */
    public function recipes()
    {
        $category = Category::all();
        $recipe = Recipe::all();
        $recipes = [
            'recipes' => $recipe,
            'categories' => $category
        ];

        return $recipes;
    }
}
