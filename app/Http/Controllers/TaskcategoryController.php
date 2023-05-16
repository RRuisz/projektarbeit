<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Taskcategory;
use Illuminate\Http\Request;

class TaskcategoryController extends Controller
{
    public function createcategory() 
    {
        $departments = Department::all();
        return view('checklists.newcategory', compact('departments'));
    }

    public function savecategory(Request $request)
    {
        $category = new Taskcategory;
        $category->name = $request->name;
        $category->department_id = $request->department_id;
        $category->save();
        
        return $category;
    }
}
