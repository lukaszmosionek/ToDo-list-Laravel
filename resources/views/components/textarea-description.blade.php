@props(['task'])

<label class="block mt-6"> {{ __('Description') }}:
    <textarea name="description" placeholder="{{ __('Description') }}"  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block">{{ $task->description ?? '' }}</textarea>
</label>
