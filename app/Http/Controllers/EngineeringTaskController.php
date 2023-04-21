<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EngineeringTaskController extends Controller
{
    public function index() 
    {
        $open = DB::table('engineeringtasks')
                                    ->where('status', '=', 0)
                                    ->join('users', 'users.id', '=', 'engineeringtasks.user_id')
                                    ->select('engineeringtasks.id','engineeringtasks.name AS taskname','engineeringtasks.description', 'engineeringtasks.status', 'engineeringtasks.creat_date','users.name' )
                                    ->get();
        $done = DB::table('engineeringtasks')
                                    ->where('status', '=', 1)
                                    ->join('users', 'users.id', '=', 'engineeringtasks.user_id')
                                    ->select('engineeringtasks.name AS taskname', 'engineeringtasks.status', 'engineeringtasks.creat_date','users.name' )
                                    ->get();
                                
        return view('engineering.index', ['opentask' => $open,'donetask' => $done]);
    }
    public function single($id){
        $task = DB::table('engineeringtasks')->where('engineeringtasks.id', $id)
                                      ->join('users', 'engineeringtasks.user_id', '=', 'users.id')
                                      ->select('engineeringtasks.name', 'engineeringtasks.description','engineeringtasks.creat_date','engineeringtasks.complete_date','users.name' )
                                      ->first();;
        return view('engineering.single', ['task' => $task]);
    }   


}


