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
                                    ->select('engineeringtasks.name','engineeringtasks.description', 'engineeringtasks.status', 'engineeringtasks.creat_date','users.name' )
                                    ->get();
        $done = DB::table('engineeringtasks')
                                    ->where('status', '=', 1)
                                    ->join('users', 'users.id', '=', 'engineeringtasks.user_id')
                                    ->select('engineeringtasks.description', 'engineeringtasks.status', 'engineeringtasks.creat_date','users.name' )
                                    ->get();
                                
        return view('engineering.index', ['opentask' => $open,'donetask' => $done]);
    }
}


