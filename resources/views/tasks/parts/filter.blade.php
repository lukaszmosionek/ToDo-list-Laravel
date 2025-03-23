<form method="GET" action="{{ route('tasks.index') }}" class="flex justify-between mt-6 items-end">
    <x-select-priority></x-select-priority>

    <x-select-status></x-select-status>

    <label class="block mt-6">{{ __('Valid from') }}
        <input onchange="validateDates()" id="valid_from" type="date" name="due_date_from" value="{{ request('due_date_from') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block">
    </label>

    <label class="block mt-6">{{ __('Valid to') }}
        <input onchange="validateDates()" id="valid_to" type="date" name="due_date_to" value="{{ request('due_date_to') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block">
    </label>

    <div class="block mt-6">
        <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">{{ __('Filter') }}</button>
        <a class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('tasks.index') }}">{{ __('Reset') }}</a>
    </div>
</form>


<p id="date_error" class="mt-6 text-center text-red-500 mt-2 hidden">"Valid from" date cannot be later than "Valid to" date.</p>

<script>
function validateDates() {
    let validFrom = document.getElementById('valid_from').value;
    let validTo = document.getElementById('valid_to').value;
    let errorMessage = document.getElementById('date_error');

    if (validFrom && validTo && validFrom > validTo) {
        errorMessage.classList.remove('hidden');
    } else {
        errorMessage.classList.add('hidden');
    }
}
</script>
