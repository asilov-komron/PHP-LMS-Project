<?php
namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function show(Task $task)
    {
        $task->load('solutions.student'); 
        return view('teacher.tasks.show', compact('task'));
    }


    
    public function create(Subject $subject)
    {
        return view('teacher.tasks.create', compact('subject'));
    }

    
    public function store(Request $request, Subject $subject)
    {
        
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'nullable|integer',
        ]);

        
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->points = $request->points;
        $task->subject_id = $subject->id;
        $task->save();

        
        return redirect()->route('teacher.subjects.show', $subject->id)
            ->with('success', 'Task created successfully.');
    }


    public function edit(Task $task)
    {
        return view('teacher.tasks.edit', compact('task'));
    }

    
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'nullable|integer',
        ]);

        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'points' => $request->points,
        ]);

        return redirect()->route('teacher.tasks.show', $task->id)
            ->with('success', 'Task updated successfully.');
    }
}
