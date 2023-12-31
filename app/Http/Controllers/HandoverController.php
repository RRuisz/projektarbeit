<?php

namespace App\Http\Controllers;

use App\Models\{Handover, Department};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth};

class HandoverController extends Controller
{
    /**
     * Handover index Gets all Handover each department and creator
     *
     * @return view / $handover & $user
     */
    public function index(){

        $handover = Handover::orderBy('id', 'desc')->get();
        return view('handover.index', compact('handover'));
    }

    /**
     * Gets one Handover by id and puts loggedin user into table 'handover_user'
     * 
     * @param int $id Handover id
     * @return view $handover & $user
     */
    public function single($id) {
        $handover = Handover::find($id);
        $department = Department::find($handover->id);
        if (!$handover->userread->contains(Auth::id())) {
            $handover->userread()->attach(Auth::id());
        }
        $handover = Handover::find($id);
        return view('handover.single', compact('handover', 'department'));

    }

    /**
     * Creat a new Handoversite 
     * gets Departments from database for select
     * 
     * @return view $department & $user
     */
    public function new(){
        $userdepartment = Department::where('id', '=', Auth::user()->department_id)->get();
        $departments = Department::all();

        return view('handover.new', compact('departments', 'userdepartment'));
    }
    
    
    /**
     * saves a new Handover and the handover_id & department_id in pivot table
     * 
     * @param Request $request
     * @return view of created Handover
     */
    public function save(Request $request){
        $request->validate([
            'headline' => 'required|max:255',
            'content' => 'required',
            'department' => 'required',
        ]);

        $handover = new Handover();
        $handover->user_id = Auth::user()->id;
        $handover->headline = $request->headline;
        $handover->content = $request->content;
        $handover->save();
        $handover->department()->attach($request->department);

        return redirect()->route('handover.single', $handover->id);
    }

    /**
     * datach the many to many relationship from userread and department
     * deletes an Handover from the database
     * 
     * @param int $id
     * @return redirect Handover overview
     */
    public function delete($id)
    {
        $task = Handover::find($id);
        $task->userread()->detach();
        $task->department()->detach();
        $task->delete();
        return redirect()->route('handover');
    }

    /**
     * to edit existing handover
     * 
     * @param $id
     * @return view and $handover
     */
    public function edit($id)
    {
        $handover = Handover::find($id);

        return view('handover.edit', compact('handover'));
    }

    /**
     * saves edited handover
     * 
     * @param Request $request, $id
     * @return redirect to single view
     */
    public function saveedit($id, Request $request)
    {
        $handover = Handover::find($id);

        $handover->headline = $request->headline;
        $handover->content = $request->content;
        $handover->save();

        return redirect()->route('handover.single', $id);
    }
}


