<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewspostController extends Controller
{
    /**
     * Homescreen with latest Newsposts and open Engineeringtasls
     * 
     * @return view and Newsposts and Engineeringtasks
     */
    public function home(){
        $data = DB::table('newsposts')
                    ->join('users', 'newsposts.user_id', '=', 'users.id')
                    ->orderBy('newsposts.created_at', 'desc')
                    ->select('newsposts.id', 'newsposts.topic','newsposts.created_at', 'users.name')
                    ->take(5)
                    ->get();
        $engineeringtasks = DB::table('engineeringtasks')
                                ->join('users', 'engineeringtasks.user_id', '=', 'users.id')
                                ->orderBy('engineeringtasks.created_at', 'desc')
                                ->select('engineeringtasks.id AS taskid','engineeringtasks.name AS taskname', 'engineeringtasks.status', 'engineeringtasks.created_at','users.name' )
                                ->where('engineeringtasks.status', '=', 0)
                                ->take(5)->get();
        return view('home', ['news' => $data, 'engineeringtasks' => $engineeringtasks]);
    }

    /**
     * Overview of Newsposts
     * 
     * @return view and Newsposts
     */
    public function news(){
        $data = DB::table('newsposts')->join('users', 'newsposts.user_id', '=', 'users.id')
                                      ->orderBy('newsposts.created_at', 'desc')
                                      ->select('newsposts.id', 'newsposts.topic', 'newsposts.content','newsposts.created_at','users.name' )
                                      ->get();
        return view('news.index', ['news' => $data]);
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
        return view('news.single', ['post' => $post]);
    }   
}
