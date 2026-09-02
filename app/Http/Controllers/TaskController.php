<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('is_deleted', 'false')->get();

        return view('tasks.index', compact('tasks'));
    }

    //タスクを追加する
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $task = new Task();

        $task->task_name = $request->input('task_name');
        $task->due_date = $request->input('due_date');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'タスクを追加しました');
    }

    public function trash()
    {
        $tasks = Task::where('is_deleted', true)->get();
        return view('tasks.trash', compact('tasks'))->with('success', 'タスクをゴミ箱に移動しました');
    }

    //ゴミ箱に移動する
    public function maskAsDeleted(Task $task)
    {
        $task->update(['is_deleted' => true]);

        return redirect()->route('tasks.index')->with('success', 'タスクをゴミ箱に移動しました');
    }

    //ゴミ箱から復元する
    public function recover(Task $task)
    {
        $task->update(['is_deleted' => false]);

        return redirect()->route('tasks.index')->with('success', 'タスクを復元しました');
    }

    //1件削除する
    public function deleteTrash(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.trash')->with('success', 'タスクを一件削除しました');
    }

    //ゴミ箱を空にする
    public function allTrash()
    {
        Task::where('is_deleted', true)->delete();

        return redirect()->route('tasks.trash')->with('success', 'ゴミ箱を空にしました');
    }
}
