{{-- @extends('layouts.app')

@section('content')


@include('form',['task'=>$task->id])

@endsection --}}

{{-- THE ABOVE LINES ARE FOR REUSING CODES IN FORM.BLADE.PHP FOR CREATE AND EDIT --}}





@extends('layouts.app')

@section('title', 'Edit Task')


@section('styles')

<style>
    .error-message{
        color: red;
        font-size: 0, 8rem;
    }
</style>

@endsection




@section('content')

    {{-- {{ $errors }} --}}

    <form action="{{ route('task.update',['task'=>$task->id]) }}" method="POST">
        @csrf   {{-- CSRF Means Cross Side Request Forgery --}}
        
        @method('PUT')    {{-- Method Spoofing --}}
      
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Update Task</button>
        </div>
        <a href="{{ route('tasks.index') }}">Cancel</a>

    </form>


@endsection