<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $response = [
            [
                'name' => 'Varrer a casa',
                'responsible' => 'Guilherme',
                'status' => false
            ]
        ];
        return response($response, 200);
    }
    public function create(Request $request)
    {
        $todo = $request->validate([
            'name' => ['required', 'string'],
            'responsible' => ['required', 'string'],
            'status' => ['required', 'boolean']
        ]);
        return response($todo, 201);
    }
}
