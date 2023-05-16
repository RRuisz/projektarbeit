<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth};
use App\Models\Checklist;
use App\Models\Checklisttask;
use Carbon\Carbon;

class ChecklistController extends Controller
{

    /**
     * TODO: DOC!
     */
    public function newchecklist()
    {
        $checklist = new Checklist;
        $tasks = Checklisttask::all();
        $checklist->name = $tasks[0]->taskcategory->department->name;
        $checklist->department_id = Auth::user()->department_id;
        $todayDate = Carbon::now()->toDateString();
        $checklistcheck = Checklist::where('department_id', Auth::user()->department_id)->whereDate('created_at', $todayDate)->first();
        if ($checklistcheck){
            return $checklistcheck;
        } else {
            $checklist->save();
            foreach($tasks as $task){
                if ($task->taskcategory->department_id == Auth::user()->department_id){
                    $task->checklist($checklist->id)->attach($task);
                }
            }
            // TODO: RETURN!!! VIEW!!!
        }

    }
}
