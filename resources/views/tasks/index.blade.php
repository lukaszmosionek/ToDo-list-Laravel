@extends('layouts.app')

@section('content')
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="">
            <a class="block mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('tasks.create') }}">{{ __('Add task') }}</a>
        </div>

        @include('tasks.parts.errors')

        @include('tasks.parts.filter')
        @if( count($tasks) )
            @include('tasks.parts.task-list')
        @else
            <div class="text-center mt-6">{{ __('No tasks') }}</div>
        @endif

    </div>
@endsection
