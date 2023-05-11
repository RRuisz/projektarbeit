<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Taskcomment};

class TaskcommentController extends Controller
{

    /**
     * deletes a single task comment
     * 
     * @param int $id
     * @return back
     */
    public function deleteComment($id)
    {
        $comment = Taskcomment::find($id);
        $comment->engineeringtask()->detach();
        $comment->delete();
        return back();
    }
}
