<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $tasksCount = Task::count(); 
        $usersCount = User::count(); 
        $pendingTasks = Task::where('status', 'pending')->count(); 
        $inProcessTasks = Task::where('status','inProcess')->count();

        
        return view('admin.dashboard', compact('tasksCount', 'usersCount', 'pendingTasks','inProcessTasks'));
    }
}

