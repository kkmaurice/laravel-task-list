@extends('layouts.app')


@section('title', 'The list of all tasks')



@section('content')
@if(count($tasks) > 0)
    @foreach ($tasks as $task)
     <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"> {{ $task->title }}</a>
       
     </div>
    @endforeach
@else
    <div>There are no tasks!</div>
@endif

@if ($tasks->count() > 0)
    <nav>
        {{ $tasks->links() }}
    </nav>
@endif
@endsection

