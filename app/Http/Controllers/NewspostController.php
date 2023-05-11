<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth};
use App\Models\{Newspost, Engineeringtask, User};

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
        return view('home', ['news' => $data, 'engineering_tasks' => $engineering_tasks]);
    }

    /**
     * Overview of Newsposts
     * 
     * @return view and Newsposts
     */
    public function index(){
        $data = Newspost::orderBy('created_at','desc')->get();
        return view('news.index', ['news' => $data]);
    }

    /**
     * Detailed view of Newsposts
     * 
     * @param int $id of newspost
     * @return view and single Newsposts
     */
    public function single(int $id){
        $post = Newspost::find($id);
        $user = User::all();
        if (!$post->userread->contains(Auth::id())) {
            $post->userread()->attach(Auth::id());
        }

        return view('news.single', ['post' => $post, 'users' => $user]);
    }    

    /**
     * Shows Form for new Newspost
     * 
     */
    public function new() 
    {
        return view('news.new');
    }

    /**
     * Saves new Newspost
     * 
     * @param Request $request
     * return redirect to news overview page
     */
    public function save(Request $request)
    {

        $request->validate([
            'topic' => 'required',
            'content' => 'required'
        ]);

        $news = new Newspost();
        $news->topic = $request->topic;
        $news->content = $request->content;
        $news->user_id = Auth::id();
        $news->save();

        return redirect()->route('news');
    }

    /**
     * deletes an Newspost from the database
     * 
     * @param int $id
     * @return redirect News overview
     */
    public function delete($id)
    {
        $task = Newspost::find($id);
        $task->delete();
        return redirect()->route('news');
    }
}
