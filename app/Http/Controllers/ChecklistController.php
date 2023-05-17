<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth};
use App\Models\Checklist;
use App\Models\Checklisttask;
use Carbon\Carbon;

class ChecklistController extends Controller
{

    public function index()
    {
        $checklist = Checklist::where('department_id', Auth::user()->department_id)->get();
        $todayDate = Carbon::now()->toDateString();

        return view('checklists.index', compact('checklist', 'todayDate'));
    }

    public function single(int $id)
    {
        $checklist = Checklist::find($id);
    
        return view('checklists.single', compact('checklist'));
    }

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
            return redirect()->route('checklist.single', $checklistcheck->id);
        } else {
            $checklist->save();
            foreach($tasks as $task){
                if ($task->taskcategory->department_id == Auth::user()->department_id){
                    $checklist->checklisttask()->attach($task);
                }
            }
            return redirect()->route('checklist.single', $checklist->id);
        }

    }

    public function updatestatus(Request $request)
    {
        $checklist = Checklist::find($request->checklistId);
        $task = $checklist->checklisttask->find($request->taskId);
        $checklist->checklisttask()->updateExistingPivot($task->id, [
            'status' => $request->taskStatus,
            'done_at' => Carbon::now(),
            'user_name' => Auth::user()->name
        ]);
    } 
}
