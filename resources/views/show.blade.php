@extends('layouts.app')


@section('title', $task->title)

@section('content')

<p>{{ $task->description }}</p>

@if ($task->long_description)
    <p>{{ $task->long_description }}</p>
@else
    <p>No long description for this</p>
@endif

<p>Created at: {{ $task->created_at }}</p>

<p>
    @if ($task->completed)
        completed
    @else
        Not completed
    @endif
</p>

<div>
    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
</div>

<div>
    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
    @csrf
    @method('PUT')
    <button type="submit">
        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
    </button>
    </form>
</div>

<div>
    <form method="POST" action="{{ route('tasks.destroy', ['task'=>$task ]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
   </form>
</div>
@endsection
