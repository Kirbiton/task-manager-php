<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function showHomeForm()
    {
        return view('home');
    }

    public function AddTask(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $tasks = task::create([
            'title' => $request->title,
            'is_completed' => false,
        ]);

        return redirect()->route('home');
    }
    
    public function destroy($id)
    {
        $tasks->delete();

    }

    public function index()
    {
        $tasks = task::all();
        return view('tasks.index',compact('tasks'));
    }
}