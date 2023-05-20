<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklisttask;
use App\Models\Taskcategory;
use Illuminate\Support\Facades\{DB, Auth};

class ChecklisttaskController extends Controller
{
    /**
     * gets categories for the users department 
     * view to create a new checklisttask
     * 
     * @return view
     */
    public function createtask()
    {
        $taskcategory = Taskcategory::where('department_id', Auth::user()->department_id)->orderBy('name','asc')->get();

        return view('checklists.newtask', compact('taskcategory'));
    }

    /**
     * saves the new checklist task
     * 
     * @param Request $request
     * @return $task
     */
    public function savetask(Request $request)
    {
        $task = new Checklisttask;
        $task->name = $request->name;
        $task->taskcategory_id = $request->taskcategory_id;
        $task->save();

        return $task;
    }
}
