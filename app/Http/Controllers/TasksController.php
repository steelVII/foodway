<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function __construct() {

        $task = Task::all();

        return view('tasks.index', compact('tasks'));

    }
    
    public function index() {

        $task = Task::all();

        return view('tasks.index', [
    
            'task' => $task
    
        ]);

    }

    public function show(Task $task) {

        //$task = Task::find($id);

        return view('tasks.show', [
    
            'task' => $task
    
        ]);

    }

}
