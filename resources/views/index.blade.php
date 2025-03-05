@extends('layouts.app')
@section('title','Index Page')
@section('content')
<nav class="mb-5">
<a href="{{route('tasks.create')}}"
class="link">Add New Task</a>
</nav>
@forelse($tasks as $task)
 <div class="mb-2">
  <a href={{route('tasks.show',['task'=>$task->id])}} @class(['font-bold', 'line-through'=> $task->completed])>{{$task->title}}</a>
 </div>
@empty
No Record found
@endforelse
<div class="mt-4">
{{$tasks->links()}}
</div>
@endsection
