<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('description', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%');
        }

        $tasks = $query->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('tasks.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required|string',
            'status' => 'required|in:pending,completed',
        ]);

        Task::create($request->all());

        session()->flash('success', 'Task created successfully.');

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'description' => 'required|string',
            'status' => 'required|in:pending,completed',
        ]);

        $task->update($request->all());

        session()->flash('success', 'Task updated successfully.');

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        session()->flash('success', 'Task deleted successfully.');

        return redirect()->route('tasks.index');
    }
}
