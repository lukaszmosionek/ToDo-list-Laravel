@props(['task'])

<label class="block mt-6">{{ __('Priority') }}:
    <select name="priority" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block" style="width:200px;">
        <option value="">-- {{ __('Choose') }} --</option>
        @foreach(App\Enums\TaskPriority::map() as $priority)
            <option value="{{ $priority }}" {{ @(request('priority') ?? $task->priority) == $priority ? 'selected' : '' }}>{{ __($priority) }}</option>
        @endforeach
    </select>
</label>
