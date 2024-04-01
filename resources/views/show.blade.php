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
@endsection
