@extends('layouts.app')

@section('content')

    @if (isset($tasks))


    <div class="flex">
        @foreach ($tasks as $task)
        <a href="{{ route('tasks.show',$task->id) }}" class="block w-1/4">
        
            <div class="block p-6 mx-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <!--<div onclick="my_modal_{{$task->id}}.showModal()" class="block p-6 mx-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">-->
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                    {{ $task->content }}
                </h5>
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                    {{ $task->status }}
                </h5>
            </div>
        </a>
            <!--<dialog id="my_modal_{{ $task->id }}" class="modal">-->
            
                
            <!--    <div class="modal-box">-->
                    
            <!--        <form method="POST" action="{{ route('tasks.update', $task->id) }}">-->
            <!--            @csrf-->
            <!--            @method('PUT')-->
                        
            <!--            <label class="input input-bordered flex items-center gap-2">-->
            <!--                <input type="text" class="grow font-bold" value="{{$task->content}}" />-->
            <!--            </label>-->
                        
            <!--            <button class="btn" type="submit">-->
            <!--                Submit-->
            <!--            </button>-->
                        
            <!--        </form>-->
                    
            <!--        <div class="modal-action">-->
            <!--            <form method="dialog">-->
                            <!-- if there is a button in form, it will close the modal -->
            <!--                <button class="btn">Close</button>-->
            <!--            </form>-->
            <!--        </div>-->
                    
            <!--    </div>-->
            <!--</dialog>-->
        @endforeach
        
        <a href="{{route('tasks.create') }}" class="block w-1/4">
        
            <div class="block p-6 mx-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-400">
                    新規タスク追加
                </h5>
            </div>
        </a>
    </div>   

    @endif

@endsection