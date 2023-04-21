<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewspostController extends Controller
{
    public function home(){
        $data = DB::table('newsposts')
                    ->join('users', 'newsposts.user_id', '=', 'users.id')
                    ->orderBy('newsposts.creat_date', 'desc')
                    ->select('newsposts.id', 'newsposts.topic','newsposts.creat_date', 'users.name')
                    ->take(5)
                    ->get();
        $engineeringtasks = DB::table('engineeringtasks')
                                ->join('users', 'engineeringtasks.user_id', '=', 'users.id')
                                ->orderBy('engineeringtasks.creat_date', 'desc')
                                ->select('engineeringtasks.name AS taskname', 'engineeringtasks.status', 'engineeringtasks.creat_date','users.name' )
                                ->where('engineeringtasks.status', '=', 0)
                                ->take(5)->get();
        return view('home', ['news' => $data, 'engineeringtasks' => $engineeringtasks]);
    }
    public function news(){
        $data = DB::table('newsposts')->join('users', 'newsposts.user_id', '=', 'users.id')
                                      ->orderBy('newsposts.creat_date', 'desc')
                                      ->select('newsposts.id', 'newsposts.topic', 'newsposts.content','newsposts.creat_date','users.name' )
                                      ->get();
        return view('news.index', ['news' => $data]);
    }
    public function single($id){
        $post = DB::table('newsposts')->where('newsposts.id', $id)
                                      ->join('users', 'newsposts.user_id', '=', 'users.id')
                                      ->select('newsposts.id', 'newsposts.topic', 'newsposts.content','newsposts.creat_date','users.name' )
                                      ->first();;
        return view('news.single', ['post' => $post]);
    }   
}
