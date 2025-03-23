@extends('layouts.app')

@section('content')
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="width: 300px;">
        <h1 class="text-xl font-extrabold mt-6">{{ __('Add task') }}</h1>

        @include('tasks.parts.errors')

        <form action="{{ route('tasks.store') }}" method="POST" class="mt-6">
            @csrf
            <x-input-name></x-input-name>
            <x-input-date></x-input-date>
            <x-textarea-description></x-textarea-description>
            <x-select-priority></x-select-priority>
            <x-select-status></x-select-status>
            <x-checkbox-google-calendar></x-checkbox-google-calendar>
            <div class="mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >{{ __('Add task') }}</button>
                <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >{{ __('Back') }}</a>
            </div>
        </form>
    </div>
@endsection
