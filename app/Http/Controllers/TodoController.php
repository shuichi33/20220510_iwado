<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
       return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
       $request->validate([
        'content' => 'required|max:20'
        ]);
        Todo::create([
        'content'=> $request->content
       ]);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

        public function delete(Request $request)
    {
        $Todo = Todo::find($request->id)->delete();
        return redirect('/');
    }
   
}









