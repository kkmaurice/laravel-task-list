@extends('layouts.app')


@section('title', 'The list of all tasks')



@section('content')
@if(count($tasks) > 0)
    @foreach ($tasks as $task)
     <div>
        <a href="{{ route('tasks.show', ['id' => $task->id]) }}"> {{ $task->title }}</a>
       
     </div>
    @endforeach
@else
    <div>There are no tasks!</div>
@endif
@endsection

