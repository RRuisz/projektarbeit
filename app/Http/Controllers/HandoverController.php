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
        $handover = Handover::join('users', 'users.id', '=', 'handovers.user_id')
                                ->join('handover_department', 'handovers.id', '=', 'handover_department.handover_id')
                                ->join('departments', 'departments.id', '=', 'handover_department.department_id')
                                ->select('handovers.*', 'departments.name as department_name', 'handover_department.department_id', 'users.name as user_name')
                                ->orderBy('handovers.id', 'desc')
                                ->get();
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
        $handover = Handover::find($request->id);
        $handover->join('users', 'users.id', '=', 'handovers.user_id')
                ->join('handover_department', 'handovers.id', '=', 'handover_department.handover_id')
                ->join('departments', 'departments.id', '=', 'handover_department.department_id')
                ->select('handovers.*', 'departments.name as department_name', 'users.name as user_name')
                ->get();
        
    }

    /**
     * Creat a new Handoversite 
     * gets Departments from database for select
     * 
     * @return view $department & $user
     */
    public function new(){
        $user = session('user');
        $departments = Department::all();

        return view('handover.new', compact('departments', 'user'));
    }
    
    
    /**
     * saves a new Handover and the handover_id & department_id in pivot table
     * 
     * @param Request $request
     * @return view of created Handover
     */
    public function save(Request $request){
        //TODO: NOCH NICHT IMPLEMENTIERT 
        $request->validate([
            'headline' => 'required|max:255',
            'content' => 'required',
            'department_id' => 'required',
        ]);

        $user = session('user');

        $handover = new Handover();
        $handover->user_id = $user->id;
        $handover->headline = $request->headline;
        $handover->content = $request->content;
        $handover->departments()->attach($request->department_id);
        // $handover->save();
        dd($handover);

        return redirect()->route('handover.single', $handover->id);
    }
}


