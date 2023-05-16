<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Ingredient, Checklisttask, Department};

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

    // NUR TEST FÜR DATENBANK STRUKTUR!
    public function checklists()
    {
        $checklist = Checklisttask::all();
        return $checklist[0]->name;
    }
}
