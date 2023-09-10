<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Route::get('/', function (){
//     return view('index');
// });

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');


Route::view('/tasks/create', 'create')->name('task.create');



Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', ['task' => $task]);
})->name('tasks.edit');


Route::get('/tasks/{task}', function (Task $task) { //Route model binding

    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');


Route::post('/tasks', function (TaskRequest $request){
    // $data = $request->validated();
    // $task = new \App\Models\Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show',['task'=>$task])->with('success', 'Task created successfully!');


})->name('task.store');


Route::put('/tasks/{task}', function (Task $task, TaskRequest $request){
    // $data = $request->validated();
    // // $task = Task::findOrFail($id);
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task->update($request->validated());

    return redirect()->route('tasks.show',['task'=>$task->id])->with('success', 'Task updated successfully!');


})->name('task.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task){
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('task.toggle.complete');





    
    
    // GET
    // POST 
    // PUT 
    // DELETE 

    
// Route::get('/', function () {
    // TO PASE DATA INTO A BLADE TEMPLATE YOU NEED 
    // TO PASS IT AS AN ARRAW AND THEN USE IT IN THE VIEW FILE
    // return view('index', [
        // 'name' => 'Ben',
    // ]);
// });

// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function (){
//     return redirect()->route('hello');
// });


// Route::get('/greet/{name}', function ($name){
//     return 'Hello ' . $name . '!';
// });


//TO REDIRECT ALL NON EXISTING URLs USE THE BELOW ROUTING 
Route::fallback(function (){
    return 'Well I think you entered a wrong link!';
});









    






