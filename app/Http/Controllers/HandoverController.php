<?php

namespace App\Http\Controllers;

use App\Models\{Handover, Department};
use Illuminate\Http\Request;

class HandoverController extends Controller
{
    /**
     * Handover index Gets all Handover each department and creator
     *
     * @return view / $handover & $user
     */
    public function index(){

        $handover = Handover::orderBy('id', 'desc')->get();
        $user = session('user');
        return view('handover.index', compact('handover', 'user'));
    }

    /**
     * Gets one Handover by id
     * 
     * @param int $id Handover id
     * @return view $handover & $user
     */
    public function single(Request $request){
        // TODO: NOCH NICHT IMPLEMINTIERT!!!!
        $handover = Handover::find($request->id);
        return $handover;
    }

    /**
     * Creat a new Handoversite 
     * gets Departments from database for select
     * 
     * @return view $department & $user
     */
    public function new(){
        $user = session('user');
        $userdepartment = Department::where('id', '=', $user->id)->get();
        $departments = Department::all();

        return view('handover.new', compact('departments', 'user', 'userdepartment'));
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
        
        $user = session('user');
        $handover = new Handover();
        $handover->user_id = $user->id;
        $handover->headline = $request->headline;
        $handover->content = $request->content;
        $handover->save();
        $handover->department()->attach($request->department);

        return redirect()->route('handover.single', $handover->id);
    }
}


