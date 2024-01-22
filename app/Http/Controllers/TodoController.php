<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }
    public function store(Request $request)
    {
        $data = new Todo;
        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();
        return redirect()->back();
    }
    public function update(Todo $todo)
    {
        $todo->update(['isDone' => true]);
        return redirect()->back();
    }
    public function deletetodo($id){
        $todos = Todo::find($id);
        $todos->delete();

        return redirect()->back();
    }
}
