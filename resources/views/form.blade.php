@section('title',isset($task)?'Edit Task':'Add Task')
@section('content')
<form method="post" action="{{isset($task)?route('tasks.update',['task'=>$task]):route('tasks.store')}}">
    @csrf
    @isset($task)
    @method('PUT')
    @endisset
    <div class="mb-4">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{$task->title ?? old('title')}}"
        @class(["border-red-500"=> $errors->has('title')]) />
        @error('title')
        <div class="error-message">{{$message}}</div>
        @enderror
    </div>
     <div class="mb-4">
        <label for="description">Description:</label>
        <textarea name="description" id="description" @class(["border-red-500"=> $errors->has('description')])>{{$task->description ?? old('description')}}</textarea>
        @error('description')
     <div class="error-message">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-4">
        <label>Long Description:</label>
        <textarea name="long_description" id="long_description" @class(["border-red-500"=> $errors->has('long_description')])>{{$task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
        <div class="error-message">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-4 flex gap-2 items-center">
     <button type="submit" class="btn" name="submit" value="submit">
       @isset($task)
        Update Task
       @else
        Add Task
        @endisset
     </button>
     <a class="link" href="{{route('tasks.index')}}">Cancel</a>
    </div>
</form>
@endsection
