@props(['task'])
<label class="block mt-6"> {{ __('Due Date') }}:
    <input type="date" name="due_date" value="{{ $task->due_date ?? '' }}" required class="order-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block" style="width:200px;">
</label>
