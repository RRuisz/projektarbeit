<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth};
use App\Models\User;
use App\Models\{EngineeringTask, Taskcomment};
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
           
        
        return view('engineering.index', ['opentask' => $open,'donetask' => $done]);
    }

    /**
     * Detailed view of an Engineering Task.
     * 
     * @param  int $id of Engineering Task
     * @return view and a single task 
     */
    public function single(int $id){
        $task = Engineeringtask::find($id);
        
        return view('engineering.single', ['task' => $task]);
    }   

    /**
     * Create a new Engineering Task.
     * 
     * @return view  
     * 
     */
     
    public function new(){
        return view('engineering.new');
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
        
        $task = new EngineeringTask;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->status = 0;
        $task->save();
        return redirect()->route('engineeringtask.single', $task->id);
    }

    /**
     * saves comment for an engineering task.
     * 
     * @param Request $request
     * @return redirect Engineering Overview
     */
    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|max:255',
            'status' => 'required'
        ]);
        $comment = new Taskcomment;
        
        $task = Engineeringtask::find($request->id);
        $comment->description = $request->description;
        $comment->user_id = Auth::user()->id;
        $task->status = $request->status;
        $task->save();
        $comment->save();
        $comment->engineeringtask()->attach($request->id);
        $comment->save;

        return redirect()->route('engineeringtask.single', $task->id);
    }

    /**
     * deletes an Engineeringtask from the database
     * 
     * @param int $id
     * @return redirect engineering overview
     */
    public function delete($id)
    {
        $task = EngineeringTask::find($id);
        foreach($task->taskcomment as $taskComment){
            $comment = TaskComment::find($taskComment->id);
            $task->taskcomment()->detach();
            $comment->delete();
        }
        $task->delete();
        return redirect()->route('engineering');
    }

    /**
     * Opens a finished Task again
     * 
     * @param int $id
     * @return back 
     */
    public function open($id) 
    {
        $task = EngineeringTask::find($id);
        $task->status = 0;
        $task->save();

        return back();
    }

    /**
     * to edit existing tasks
     * 
     * @param $id
     * @return view and $task
     */
    public function edittask($id)
    {
        $task = EngineeringTask::find($id);

        return view('engineering.edit', compact('task'));
    }

    /**
     * saves edited task
     * 
     * @param Request $request, $id
     * @return redirect to single view
     */
    public function editsave($id, Request $request)
    {
        $task = EngineeringTask::find($id);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('engineeringtask.single', $id);

    }

}