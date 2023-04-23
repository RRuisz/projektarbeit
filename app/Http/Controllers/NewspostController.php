<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewspostController extends Controller
{
    /**
     * Homescreen with latest Newsposts and open Engineeringtasls
     * 
     * @return view and Newsposts and engineering_tasks
     */
    public function home(){
        $data = DB::table('newsposts')
                    ->join('users', 'newsposts.user_id', '=', 'users.id')
                    ->orderBy('newsposts.created_at', 'desc')
                    ->select('newsposts.id', 'newsposts.topic','newsposts.created_at', 'users.name')
                    ->take(5)
                    ->get();
        $engineering_tasks = DB::table('engineering_tasks')
                                ->join('users', 'engineering_tasks.user_id', '=', 'users.id')
                                ->orderBy('engineering_tasks.created_at', 'desc')
                                ->select('engineering_tasks.id AS taskid','engineering_tasks.name AS taskname', 'engineering_tasks.status', 'engineering_tasks.created_at','users.name' )
                                ->where('engineering_tasks.status', '=', 0)
                                ->take(5)->get();
        $user = session('user');
        return view('home', ['news' => $data, 'engineering_tasks' => $engineering_tasks, 'user' => $user]);
    }

    /**
     * Overview of Newsposts
     * 
     * @return view and Newsposts
     */
    public function index(){
        $data = DB::table('newsposts')->join('users', 'newsposts.user_id', '=', 'users.id')
                                      ->orderBy('newsposts.created_at', 'desc')
                                      ->select('newsposts.id', 'newsposts.topic', 'newsposts.content','newsposts.created_at','users.name' )
                                      ->get();
        $user = session('user');
        return view('news.index', ['news' => $data, 'user' => $user]);
    }

    /**
     * Detailed view of Newsposts
     * 
     * @param int $id of newspost
     * @return view and single Newsposts
     */
    public function single(int $id){
        $post = DB::table('newsposts')->where('newsposts.id', $id)
                                      ->join('users', 'newsposts.user_id', '=', 'users.id')
                                      ->select('newsposts.id', 'newsposts.topic', 'newsposts.content','newsposts.created_at','users.name' )
                                      ->first();;
        $user = session('user');
        return view('news.single', ['post' => $post, 'user' => $user]);
    }   
}
