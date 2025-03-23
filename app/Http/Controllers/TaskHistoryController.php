<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskHistory;
use Illuminate\Http\Request;

class TaskHistoryController extends Controller
{
    public function index(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Nie masz dostępu do historii tego zadania.');
        }

        $history = TaskHistory::where('task_id', $task->id)->orderBy('changed_at', 'desc')->get();

        return view('tasks.history', compact('task', 'history'));
    }
}
