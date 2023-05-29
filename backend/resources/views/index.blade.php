@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="display-4 fw-bold mb-5" >Todo List</h1>

    <div class ="row">
    <form action="{{ route('store') }}" method="post">
        @csrf
        <!-- cross-site request forgeries ~~ validates the request -->
        <div class="row">
            <div class="col-md-10">
                <input type="text" name="task" id="task" placeholder="Create a Task" value ="{{ old('task') }}"class="form-control" >
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100 mt-2">Add</button>
            </div>
        </div>
        <div class="row mb-3">
            @error('task')
            <p class ="small text-danger">{{ $message }} </p>
            @enderror
        </div>       
    </form>

    </div>

    <div class ="row my-2">
        <div class ="col">
            <ul class ="list-group">
                @forelse($task_list as $task_details)
                <li class="list-group-item d-flex align-items-center">
                    <div class="me-auto">
                    {{ $task_details->task }}
                    </div>

                    <div>
                        <form action="{{ route('destroy', $task_details->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('edit', $task_details->id) }}" class="btn btn-warning btn-sm" title="Edit Task">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>

                    

                </li>
                @empty
                    <li class =" text-success display-5 text-center">ALL TASKS ARE DONE!</li>
                @endforelse

            </ul>

        </div>

    </div>

    


@endsection