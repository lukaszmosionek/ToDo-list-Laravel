<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\Request;
use App\Service\FilterService;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::query();
        $tasks = FilterService::handle($tasks);
        $tasks = $tasks->where('user_id', auth()->user()->id )->with('history')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskStoreRequest $request)
    {
        $task = auth()->user()->tasks()->create($request->all());

        if ($request->has('add_to_google_calendar')) {
            $task->syncWithGoogleCalendar();
        }

        return redirect()->route('tasks.index')->with('success', 'Zadanie dodane!');
    }

    public function edit(Request $request, Task $task)
    {
        if (!$request->user()->can('view', $task)) {
            abort(403, __('Unauthorized'));
         }

        return view('tasks.edit', compact('task'));
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        if (!$request->user()->can('update', $task)) {
            abort(403, __('Unauthorized'));
        }

        $task->storeHistory();

        $task->update($request->except('add_to_google_calendar'));

        if ($request->has('add_to_google_calendar')) {
            $task->syncWithGoogleCalendar();
        } else {
            $task->removeFromGoogleCalendar();
        }

        return redirect()->route('tasks.index')->with('success', 'Zadanie zaktualizowane!');
    }

    public function destroy(Request $request, Task $task)
    {
        if (!$request->user()->can('delete', $task)) {
            abort(403, __('Unauthorized'));
        }

        $task->removeFromGoogleCalendar();
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Zadanie usunięte!');
    }
}
