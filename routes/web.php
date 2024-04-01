<?php
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
        'tasks'=> Task::latest()->get(),
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request) {
  $data = $request->validate(
    [
      'title'=> 'required|max:255',
      'description'=>'required',
      'long_description'=> 'required',
    ]
  );

  $task = new Task();
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];

  $task->save();

  return redirect()->route('tasks.show', ['id'=> $task->id])->with('success','Task created successfully!😂😍');
})->name('tasks.store');


// Route::get('/xxx', fn() => "hello world home of survival")->name("home");

// Route::get("/hallo", function() {
//     return redirect()->route("home");
// }
// );

// Route::get("/greet/{name}", fn($name) => "Hello $name !!");

Route ::fallback(function() {
    return 'Still got somewhere !!!';
});