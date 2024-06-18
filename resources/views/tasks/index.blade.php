@extends('layouts.app')

@section('content')

    @if (isset($tasks))


    <div class="flex">
        @foreach ($tasks as $task)
        
            <div onclick="my_modal_{{$task->id}}.showModal()" class="block w-1/5 p-6 mx-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                    {{ $task->content }}
                </h5>
            </div>
            
            <dialog id="my_modal_{{ $task->id }}" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">{{$task->content}}</h3>

                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>

        @endforeach
    </div>   

    @endif

@endsection