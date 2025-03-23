<label class="block mt-6">{{ __('Status') }}:
    <select name="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block" style="width:200px;">
        <option value="">-- {{ __('Choose') }} --</option>
        @foreach(App\Enums\TaskStatus::map() as $status)
            <option value="{{ $status }}" {{ @(request('status') ?? $task->status) == $status ? 'selected' : '' }}>{{ __($status) }}</option>
        @endforeach
    </select>
</label>
