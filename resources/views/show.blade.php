@extends('layouts.app')
@section('title',$task->title)
@section('content')
<nav class="mb-5">
<a href="{{route('tasks.index')}}"
class="link">← Go back to the task list!</a>
</nav>
<p class="mb-4 text-slate-700">{{$task->description}}</p>
<p class="mb-4 text-slate-700">{{$task->long_description}}</p>
<p class="mb-4 text-slate-500">Created {{$task->created_at->diffForHumans()}} • Updated {{$task->updated_at->diffForHumans()}}</p>
<p class="mb-4">
    @if($task->completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not Completed</span>
    @endif
</p>
<div class="flex gap-2">
    <form method="POST" action="{{route('tasks.toggle-complete',["task"=> $task])}}">
    @csrf
    @method('PUT')
    <button type="submit" class="btn" name="submit">Mark As {{$task->completed?'not completed':'completed'}}</button>
    </form>
    <a href="{{route('tasks.edit',['task'=>$task])}}"
    class="btn">Edit Task</a>
    <form method="POST" action="{{route('tasks.destroy',['task'=>$task->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn" name="submit">Delete Task</button>
    </form>
</div>
@endsection
