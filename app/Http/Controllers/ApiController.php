<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function users()
    {
        $user = User::all();
        return $user;
    }

    public function ingredients()
    {
        $ingredient = Ingredient::all();
        return $ingredient;
    }
}
