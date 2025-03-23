@props(['task'])

<label class="block mt-6"> {{ __('Task name') }}
    <input type="text" name="name" value="{{ $task->name ?? '' }}" placeholder="{{ __('Task name') }}" required  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block">
</label>
