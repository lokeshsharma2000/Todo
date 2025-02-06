<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get(); 
        return view('tasks.create', compact('users'));
    }



public function store(Request $request)
{
    if (!Auth::user()->is_admin) {
        return redirect()->route('tasks.index')->with('error', 'You are not authorized to create tasks.');
    }

    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'user_id' => 'required|exists:users,id',
    ]);

    Task::create([
        'admin_id' => Auth::id(),
        'user_id' => $request->user_id,
        'title' => $request->title,
        'description' => $request->description,
        'status' => 'pending',
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task assigned successfully!');
}


    public function updateStatus(Request $request, Task $task)
    {
        $task->update(['status' => $request->status]);
        return redirect()->route('tasks.index')->with('message', 'Task status updated!');
    }

    public function markAsDone(Task $task)
    {
        if ($task->user_id == Auth::id()) { 
            $task->update(['status' => 'done']);
            return redirect()->route('tasks.index')->with('message', 'Task marked as done!');
        } else {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to mark this task as done.');
        }
    }

    public function destroy(Task $task)
    {
        if ($task->admin_id == Auth::id()) {
            $task->delete();
            return redirect()->route('tasks.index')->with('message', 'Task deleted successfully!');
        } else {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to delete this task.');
        }
    }
    
}
