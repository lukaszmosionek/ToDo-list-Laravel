@props(['task'])
<form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block mt-2">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}');" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Delete') }}</button>
</form>
