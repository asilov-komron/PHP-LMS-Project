<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Solution;
use Illuminate\Support\Facades\Auth;

class StudentTaskController extends Controller
{
    public function show(Task $task)
    {
        $task->load('subject.teacher');

        
        $studentSolutions = Solution::where('user_id', Auth::id())
            ->where('task_id', $task->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('student.tasks.show', compact('task', 'studentSolutions'));
    }

    public function submit(Request $request, Task $task)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $student = Auth::user();

        Solution::create([
            'user_id' => $student->id,
            'task_id' => $task->id,
            'content' => $request->content,  
        ]);

        return redirect()->route('student.tasks.show', $task)->with('success', 'Solution submitted successfully.');
    }
}
