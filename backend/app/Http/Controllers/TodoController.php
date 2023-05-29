<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo){
        $this->todo = $todo;
    }
    public function index(){

        // $task_list = $this->todo->latest()->get();
        $task_list = $this->todo->all();

        return view('index')->with('task_list', $task_list);
    }

    public function store(Request $request){
        $request->validate([
            'task'=>'required|min:5|max:50'
        ]);

        $this->todo->task = $request->task; //accessing the form data

        $this->todo->save();

        return redirect()->back();
    }

    public function edit($id){
        $task = $this->todo->findOrFail($id);

        return view('edit')->with('task', $task);

    }

    public function update(Request $request, $id){
        $request->validate([
            'task' => 'required|min:5|max:50'
        ]);
            $task = $this->todo->findOrFail($id);
            $task->task = $request->task;

            $task->save();
            // $this->todo->task = $request->task;

            // $this->todo->save();

            return redirect()->route('home');
    }

    public function destroy($id){
        $this->todo->destroy($id);
      
        return redirect()->back();
    }

    


}
