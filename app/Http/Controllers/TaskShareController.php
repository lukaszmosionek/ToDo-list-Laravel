<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskShareController extends Controller
{
    public function generateLink(Task $task, Request $request)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'Nie możesz udostępnić tego zadania.');
        }

        $task->generateAccessToken(120); // Link ważny przez 2 godziny

        return back()->with('success', 'Link udostępniania został wygenerowany!');
    }

    public function revokeLink(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'Nie możesz usunąć dostępu do tego zadania.');
        }

        $task->revokeAccessToken();

        return back()->with('success', 'Link do zadania został unieważniony.');
    }

    public function accessViaToken($token)
    {
        $task = Task::where('access_token', $token)->first();

        if (!$task || !$task->isAccessTokenValid()) {
            abort(403, 'Link wygasł lub jest nieprawidłowy.');
        }

        return view('tasks.shared', compact('task'));
    }
}
