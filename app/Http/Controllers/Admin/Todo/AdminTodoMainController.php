<?php

namespace App\Http\Controllers\Admin\Todo;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminTodoList;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTodoMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = AdminTodoList::orderBy('due_date', 'asc')->paginate(20);

        $todos->map(function($todo){
            $todo->assignedTo = User::where('id', $todo->assigned_to)->first();
            return $todo;
        });


        return view('admin.pages.todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role(['admin', 'staff'])->get();
        return view('admin.pages.todos.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable'],
            'due_date' => ['required', 'date'],
            'status' => ['required'],
            'assigned_to' => ['required', 'exists:users,id'],
        ]);

        $todo = AdminTodoList::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'status' => $validated['status'],
            'user_id' => auth()->id(),
            'assigned_to' => $validated['assigned_to'],
        ]);

        return redirect()->route('admin.todos.index')->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = AdminTodoList::where('id', $id)->first();

        return view('admin.pages.todos.show', compact('todo'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = AdmiNTodoList::where('id', $id)->first();
        $todo->delete();

        return redirect('admin/todos')->with('success', 'Todo deleted successfully.');
    }
}
