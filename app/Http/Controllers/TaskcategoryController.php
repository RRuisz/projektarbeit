<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Taskcategory;
use Illuminate\Http\Request;

class TaskcategoryController extends Controller
{
    /**
     * gets all departments
     * shows view where the admin can create a new taskcategory
     *
     * @return view
     */
    public function createcategory()
    {
        $departments = Department::all();
        return view('checklists.newcategory', compact('departments'));
    }

    /**
     * saves the new Taskcategory
     *
     * @param Request $request
     * @return $category
     */
    public function savecategory(Request $request)
    {
        $category = new Taskcategory;
        $category->name = $request->name;
        $category->department_id = $request->department_id;
        $category->save();

        return redirect(route('admin'));
    }
}
