<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth};
use App\Models\Checklist;
use App\Models\Checklisttask;
use App\Models\Taskcategory;
use Carbon\Carbon;

class ChecklistController extends Controller
{

    /**
     * gets all checklists by loggedin user
     * 
     * @return view & $checklist, $todayDate
     */
    public function index()
    {
        $checklist = Checklist::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'DESC')->get();
        $todayDate = Carbon::now()->toDateString();

        return view('checklists.index', compact('checklist', 'todayDate'));
    }

    /**
     * Gets an Checklist by ID
     * Gets all categorys for the loggedin users department
     * 
     * @param int $id
     * @return view & $checklist, $categories
     */
    public function single(int $id)
    {
        $checklist = Checklist::find($id);
        $categories = Taskcategory::where('department_id', Auth::user()->department_id)->get();
        return view('checklists.single', compact('checklist', 'categories'));
    }

    /**
     * checks if there is allready a Checklist for this day and department
     * 
     * @return redirect 
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

    /**
     * updates the status of the task
     * @param Request $request
     */
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

    /**
     * gets the task by the choosen category 
     * 
     *  @param Request $request
     *  @return $checklist
     */
    public function tasksByCategory(Request $request)
    {   
        $categories = Taskcategory::where('department_id', Auth::user()->department_id);
        $categoryId = $request->categoryId;
        $checklist = Checklist::with(['checklisttask' => function ($query) use ($categoryId) {
            $query->where('taskcategory_id', $categoryId);
        }])
        ->find($request->checklistId);
    
        return $checklist;
    }
}