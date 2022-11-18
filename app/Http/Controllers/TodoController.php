<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Symfony\Contracts\Service\Attribute\Required;

class TodoController extends Controller
{
    public function index()
    {

        // $todos = Todo::latest()->simplepaginate(3);
        return view('welcome', [
            'todos' => Todo::latest()->filter(request(['search']))->paginate(5)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $todo = new todo();

        $todo->title = $request->title;
        $todo->description = $request->description;

        $todo->save();

        return back();
    }

    public function update(Todo $todo)
    {
        $todo->update([
            'isDone' => true
        ]);

        return back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return back();
    }
}
