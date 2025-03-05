<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function () {
    return redirect('/tasks');
});
Route::get('/tasks', function(){
  return view('index',['tasks'=>Task::latest()->paginate(10)]);
})->name('tasks.index');
Route::view('/tasks/create','create')->name('tasks.create');
Route::get('/tasks/{task}', function(Task $task){
  return view('show',['task'=> $task]);
})->name('tasks.show');
Route::get('/tasks/{task}/edit', function(Task $task){
    return view('edit',['task' => $task]);
})->name('tasks.edit');
Route::post('/tasks', function(TaskRequest $request){
    $newTask = Task::create($request->validated());
    return redirect()->route('tasks.show',['task' => $newTask->id])
    ->with('success','task created successfully!');
})->name('tasks.store');
Route::put('/tasks/{task}', function(Task $task,TaskRequest $request){
    $task->update($request->validated());
    return redirect()->route('tasks.show',['task' => $task->id])
    ->with('success','task updated successfully!');
})->name('tasks.update');
Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')
    ->with('success','task deleted successfully!');
})->name('tasks.destroy');
Route::put('/tasks/{task}/toggle-complete', function(Task $task){
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->back()->with('success','task completion status updated successfully!');
})->name('tasks.toggle-complete');

// replaced codes during refactoring
   /*$data = $request->validated();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();*/

   /*$data = $request->validated();
    $newTask = new Task();
    $newTask->title = $data['title'];
    $newTask->description = $data['description'];
    $newTask->long_description = $data['long_description'];
    $newTask->save();*/

    // use Illuminate\Http\Request;
