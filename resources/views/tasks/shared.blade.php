@extends('layouts.guest')

@section('content')
    <div class="container text-center mt-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="mt-2"><strong>{{ __('Name') }}:</strong> {{ $task->name }}</p>
            <p class="mt-2"><strong>{{ __('Description') }}:</strong> {{ $task->description }}</p>
            <p class="mt-2"><strong>{{ __('Priority') }}:</strong> {{ ucfirst(__($task->priority)) }}</p>
            <p class="mt-2"><strong>{{ __('Status') }}:</strong> {{ ucfirst(__($task->status)) }}</p>
            <p class="mt-2"><strong>{{ __('Due Date') }}:</strong> {{ $task->due_date }}</p>
    </div>
@endsection

