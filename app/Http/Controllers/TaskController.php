<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function Index(){
        return view('home');
    }
    public function Create(){
        return view('create');
    }

    public function Store (Request $request){
        $request->validate([
            'name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'phone_number' => 'required|unique:tasks|max:11',
        ]);

        Task::insert([
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'phone_number'=>$request->phone_number,
        ]);

        // return redirect()->route('create')->with('message', 'Task Created Successfully');
        return redirect()->route('index')->with('message', 'Task Created Successfully');
    }

    public function ViewTask(){
        $tasks = Task::latest()->get();
        return view('view_task', compact('tasks'));
    }

    public function EditTask($id){
        $task_info = Task::findOrFail($id);
        return view('edit_task', compact('task_info'));
    }
    public function UpdateTask(Request $request){
        $taskid = $request->task_id;

        $request->validate([
            'name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'phone_number' => 'required|max:11',
        ]);

        Task::findOrFail($taskid)->update([
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'phone_number'=>$request->phone_number,
        ]);
        return redirect()->route('index')->with('message', 'Task Updated Successfully');
    }

    public function DeleteTask($id){
        Task::findOrFail($id)->delete();

        return redirect()->route('index')->with('message', 'Task Deleted Successfully');
    }
}

