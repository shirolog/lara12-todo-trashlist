<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function index() {

        $tasks = Task::where('is_deleted', 'false')->get();

        return view('tasks.index', compact('tasks'));
    }



    public function store(Request $request) {

        $validator = Validator::make($request->all(), [

            'task_name' => 'required|max:255',
            // 'due_date' => 'required|date',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $task = new Task();

        $task-> task_name = $request->input('task_name');
        $task-> due_date = $request->input('due_date');
        $task->save();

        return redirect()->route('tasks.index');
    }




    public function trash() {

        $tasks = Task::getTrashTasks();
        return view('tasks.trash', compact('tasks'));
    }

    public function recover(Task $task) {

        $task->recoverTask();

        return redirect()->route('tasks.index', compact('task'));
    }

    public function deleteTrash(Task $task) {

        $task->selectTrashAll();

        return redirect()->route('tasks.index');
    }
}
