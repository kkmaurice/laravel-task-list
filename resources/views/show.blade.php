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

<div>
    <form method="POST" action="{{ route('tasks.destroy', ['task'=>$task->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
   </form>
</div>
@endsection
