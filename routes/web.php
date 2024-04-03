<?php
use App\Http\Requests\TaskRequest;
use \App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

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


Route::get('/tasks', function () {
    return view('index', [
        //'tasks'=> Task::latest()->get(),
        //apply pagination
        'tasks'=> Task::latest()->paginate(10),
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    
    return view('show', ['task' => $task]);
})->name('tasks.show');

// create route
Route::post('/tasks', function(TaskRequest $request) {

  $task = Task::create( $request->validated() );

  return redirect()->route('tasks.show', ['task'=> $task->id])->with('success','Task created successfully!😂😍');
})->name('tasks.store');


// Edit route
Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {
  
  $task->update( $request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])->with('success','Task updated successfully!👍😁👌');
})->name('tasks.update');


// delete route
Route::delete('', function(Task $task, ) {
  $task->delete();
  return redirect()->route('tasks.index', ['task'=> $task->id])->with('success','Task deleted successfully');
})->name('tasks.destroy');


// Route::get('/xxx', fn() => "hello world home of survival")->name("home");

// Route::get("/hallo", function() {
//     return redirect()->route("home");
// }
// );

// Route::get("/greet/{name}", fn($name) => "Hello $name !!");

Route ::fallback(function() {
    return 'Still got somewhere !!!';
});
