@extends('layouts.app')

@section('title','Edit Task')

@section('content')
<h1 class="display-4 fw-bold mb-5">Edit Task</h1>

    <form action="{{ route('update',$task->id) }}" method="post">
    @csrf 
    <!--make it more secure and ddoublecheck the data -->
    @method('PATCH')
        
        <div class="row mb-3">

        <div class="col-md-10">
            <!-- old(name of the input, default value ==redirect to edit page == default value; error == previous input value -->
            <input type="text" name="task" id="task"  value="{{ old('task', $task->task) }}" class="form-control">

        </div>
        <div class ="col-md-2">
            <button type="submit" class="btn btn-warning w-100">Edit</button>

        </div>
        <div class="row">
            @error('task')
            <p class="text-danger small">{{ $message }} </p>
            @enderror
        </div>
            
        </div>
    </form>
@endsection