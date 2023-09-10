

{{-- @isset($name)
THE ISSET IS A CONDITIONAL FEATURE TO CHECK IF A VALUE EXISTS OR NOT
    <div>The name is: {{ $name }}</div>
@endisset  --}}

@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')

<nav>
  <a href="{{ route('task.create') }}" class="link">Add Task</a>
</nav>


  @foreach ($tasks as $task)
    <div><a href="{{ route('tasks.show',['task'=>$task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a></div>
  @endforeach

  @if ($tasks->count())
    <nav class="mt-4">
      {{ $tasks->links() }}    
    </nav>
  @endif

@endsection
