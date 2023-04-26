<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Newspost, Engineeringtask};

class NewspostController extends Controller
{
    /**
     * Homescreen with latest Newsposts and open Engineeringtasls
     * 
     * @return view and Newsposts and engineering_tasks
     */
    public function home(){
        $data = Newspost::orderBy('created_at','desc')->take(5)->get();
        $engineering_tasks = Engineeringtask::orderBy('created_at','desc')->take(5)->where('status', '=', 0)->get();
        $user = session('user');
        return view('home', ['news' => $data, 'engineering_tasks' => $engineering_tasks, 'user' => $user]);
    }

    /**
     * Overview of Newsposts
     * 
     * @return view and Newsposts
     */
    public function index(){
        $data = Newspost::orderBy('created_at','desc')->get();
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
        $post = Newspost::find($id);
        $user = session('user');
        return view('news.single', ['post' => $post, 'user' => $user]);
    }   
}
