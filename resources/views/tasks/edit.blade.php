@extends('layouts.app')

@section('content')
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="width: 300px;">
        <h1 class=" mt-6 text-4xl font-extrabold leading-none tracking-tight text-gray-900">{{ __('Edit task') }}</h1>

        @include('tasks.parts.errors')

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="mt-6">
            @csrf
            @method('PUT')
                <x-input-name :task="$task"></x-input-name>
                <x-input-date :task="$task"></x-input-date>
                <x-textarea-description :task="$task"></x-textarea-description>
                <x-select-priority :task="$task"></x-select-priority>
                <x-select-status :task="$task"></x-select-status>
                <x-checkbox-google-calendar :task="$task"></x-checkbox-google-calendar>
            <div class="mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >{{ __('Edit') }}</button>
                <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >{{ __('Back') }}</a>
            </div>
        </form>
    </div>
@endsection
