<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return response()->json(Todo::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $todo = Todo::create([
            'title' => $request->title,
            'is_done' => false,
        ]);
        return response()->json(true, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(Todo::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'is_done' => 'sometimes|required|boolean',
        ]);
        $todo = Todo::find($id);
        if ($todo) {
            $todo->update($request->only(['title', 'is_done']));
            return response()->json(true, 200);
        }
        return response()->json(false, 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
            return response()->json(true, 200);
        }
        return response()->json(false, 404);
    }
}
