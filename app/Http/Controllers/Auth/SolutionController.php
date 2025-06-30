<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function evaluate(Solution $solution)
    {
        // Load student and task information
        $solution->load('task', 'student');

        return view('teacher.solutions.evaluate', compact('solution'));
    }

    public function storeEvaluation(Request $request, Solution $solution)
    {
        $task = $solution->task;

        // Validate the earned points
        $request->validate([
            'earned_points' => "required|integer|min:0|max:{$task->points}",
        ]);

        // Save evaluation
        $solution->earned_points = $request->earned_points;
        $solution->evaluated_at = now();
        $solution->save();

        return redirect()->route('teacher.tasks.show', $task->id)
            ->with('success', 'Solution evaluated successfully.');
    }
}
