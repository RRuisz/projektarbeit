<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Ingredient, Checklisttask};

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

    // NUR TEST FÜR DATENBANK STRUKTUR!
    public function checklists()
    {
        $checklist = Checklisttask::all();
        return $checklist[0]->name;
    }
}
