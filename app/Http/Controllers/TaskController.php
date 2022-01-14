<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    
    public function index()
    {
        return view('task_add');
    }
    public function editIndex($id)
    {
        $task = Task::find($id);
        return view('task_edit',["task"=>$task]);
    }
    public function read()
    {
        //TODO
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "description"=>"required"
        ]);

        $task = new Task;
        $task->task_name = $request->name;
        $task->task_description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect("dashboard")->with('success','Task added successfully');
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "description"=>"required"
        ]);

        $task = Task::find($request->id);
        $task->task_name = $request->name;
        $task->task_description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect("dashboard")->with('success','Task updated successfully');
    }
    public function destroy(Request $request,Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect("dashboard")->with('success','Task deleted successfully');

    }
}
