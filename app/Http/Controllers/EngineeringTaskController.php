<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class EngineeringTaskController extends Controller
{
    /**
     * Overviews of all Engineering Tasks.
     * 
     * @return view and tasks seperated by status.
     */
    public function index() 
    {
        $open = DB::table('engineeringtasks')
                                    ->where('status', '=', 0)
                                    ->join('users', 'users.id', '=', 'engineeringtasks.user_id')
                                    ->select('engineeringtasks.id','engineeringtasks.name AS taskname','engineeringtasks.description', 'engineeringtasks.status', 'engineeringtasks.created_at','users.name' )
                                    ->get();
        $done = DB::table('engineeringtasks')
                                    ->where('status', '=', 1)
                                    ->join('users', 'users.id', '=', 'engineeringtasks.user_id')
                                    ->select('engineeringtasks.name AS taskname', 'engineeringtasks.status', 'engineeringtasks.created_at','users.name' )
                                    ->get();
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
        $task = DB::table('engineeringtasks')
                                    ->where('engineeringtasks.id', $id)
                                    ->join('users', 'engineeringtasks.user_id', '=', 'users.id')
                                    ->select('engineeringtasks.name', 'engineeringtasks.description','engineeringtasks.created_at','engineeringtasks.complete_date','users.name' )
                                    ->first();;
        $user = session('user');
        return view('engineering.single', ['task' => $task, 'user' => $user]);
    }   


}