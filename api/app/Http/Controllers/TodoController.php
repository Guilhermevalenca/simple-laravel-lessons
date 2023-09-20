<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return response($todos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = $request->validate([
            'name' => 'required',
            'responsible' => 'required'
        ]);
        $response = Todo::create($todo);
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id); //Todo::find($id);
        return response($todo, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'responsible' => 'required'
        ]);
        $todo = Todo::findOrFail($id);
        $todo->update($validation);
        return response($todo, 200);
    }
    public function updateStatus($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update([
           'status' => $todo['status'] === 0 ? 1 : 0
        ]);
        return response($todo,200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $validation = $request->validate([
                'ids' => ['required','array']
            ]);
            Todo::destroy($validation['ids']);
            return response(['success' => true],200);
        } catch (\Error $e) {
            return response($e, 200);
        }
    }
}
