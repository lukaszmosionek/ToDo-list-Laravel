@extends('layouts.app')

@section('content')
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="mt-6">{{ __('Task edit history') }}: {{ $task->name }}</h1>

        @if( count($history) )
        <table border="1" class="mt-6">
            <thead>
                <tr>
                    <th class="border p-2 text-center">{{ __('Changed at') }}</th>
                    <th class="border p-2 text-center">{{ __('Name') }}</th>
                    <th class="border p-2 text-center">{{ __('Description') }}</th>
                    <th class="border p-2 text-center">{{ __('Priority') }}</th>
                    <th class="border p-2 text-center">{{ __('Status') }}</th>
                    <th class="border p-2 text-center">{{ __('Due Date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $entry)
                    <tr>
                        <td class="border p-2 text-center">{{ $entry->changed_at }}</td>
                        <td class="border p-2 text-center">{{ $entry->name }}</td>
                        <td class="border p-2 text-center">{{ $entry->description }}</td>
                        <td class="border p-2 text-center">{{ ucfirst( __($entry->priority) ) }}</td>
                        <td class="border p-2 text-center">{{ ucfirst( __($entry->status))  }}</td>
                        <td class="border p-2 text-center">{{ $entry->due_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            {{ __('No history') }}
        @endif

        <a href="{{ route('tasks.index') }}" class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >{{ __('Back') }}</a>
    </div>
@endsection
