<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\EngineeringTask;
use App\Models\Handover;

class EngineeringtaskController extends Controller
{
    /**
     * Overviews of all Engineering Tasks.
     * 
     * @return view and tasks seperated by status.
     */
    public function index() 
    {
        $open = Engineeringtask::where('status', 0)->get();
        $done = Engineeringtask::where('status', 1)->get();
        $user = session('user');   
        
        return view('engineering.index', ['opentask' => $open,'donetask' => $done, 'user' => $user]);
    }

    /**
     * Detailed view of an Engineering Task.
     * 
     * @param  int $id of Engineering Task
     * @return view and a single task 
     */
    public function single(int $id){
        $task = Engineeringtask::find($id);
        // $task = DB::table('engineering_tasks')
        //                             ->where('engineering_tasks.id', $id)
        //                             ->join('users', 'engineering_tasks.user_id', '=', 'users.id')
        //                             ->select('engineering_tasks.name', 'engineering_tasks.description','engineering_tasks.created_at','engineering_tasks.complete_date','users.name' )
        //                             ->first();;
        $user = session('user');
        return view('engineering.single', ['task' => $task, 'user' => $user]);
    }   

    /**
     * Create a new Engineering Task.
     * 
     * @return view  
     * 
     */
     
    public function new(){
        $user = session('user');

        return view('engineering.new', ['user' => $user]);
    }

    /**
     * saves the new Engineering Task.
     * 
     * @param Request $request
     * @return redirect Engineering Overview
     */
    public function save(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'description' =>'required|max:255',
        ]);
        $user = session('user');
        $task = new EngineeringTask;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = $user->id;
        $task->status = 0;
        $task->save();
        
        return redirect()->route('engineering');
    }
}