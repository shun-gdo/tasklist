@extends('layouts.app')

@section('content')

    @if (isset($tasks))

    <div class="flex">
        @foreach ($tasks as $task)
            <a href="#" class="block w-1/5 p-6 mx-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                    {{ $task->content }}
                </h5>
            </a>
        @endforeach
    </div>   

    @endif

@endsection