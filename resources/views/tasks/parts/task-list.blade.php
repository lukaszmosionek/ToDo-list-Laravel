<h1 class="mt-6">{{ __('Task list') }}</h1>
<table class="w-full table-auto min-w-max mt-6  border border-gray-400">
    <thead>
        <tr>
            <th class="border p-2">{{ __('Name') }}</th>
            <th class="border">{{ __('Status') }}</th>
            <th class="border">{{ __('Description') }}</th>
            <th class="border">{{ __('Priority') }}</th>
            <th class="border">{{ __('Due Date') }}</th>
            <th class="border">{{ __('Actions') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task)
    <tr>
        <td class="border p-2 text-center"> {{ $task->name }} </td>
        <td class="border p-2 text-center"> {{ __($task->status) }} </td>
        <td class="border p-2 text-center"> {{ $task->description }} </td>
        <td class="border p-2 text-center"> {{ __($task->priority) }} </td>
        <td class="border p-2 text-center"> {{ $task->due_date }} </td>
        <td class="border p-2 text-center">
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"  href="{{ route('tasks.edit', $task) }}">{{ __('Edit') }}</a>
            @if(count($task->history))
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"  href="{{ route('tasks.history', $task) }}">{{ __('History') }}</a>
            @endif
            <x-form-tasks-share :task="$task"></x-form-tasks-share>
            <x-delete-task :task="$task"></x-delete-task>
        </td>
    @endforeach
    </tbody>
</table>
