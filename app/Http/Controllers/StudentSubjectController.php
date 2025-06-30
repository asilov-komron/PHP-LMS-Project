<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Subject;

class StudentSubjectController extends Controller
{
    
    public function index()
    {
        $student = Auth::user();

        
        $subjects = $student->subjectsTaken;  

        return view('student.subjects.index', compact('subjects'));
    }

    
    public function take()
    {
        $student = Auth::user();

        
        $takenSubjectIds = $student->subjectsTaken->pluck('id')->toArray();

        
        $subjects = Subject::whereNotIn('id', $takenSubjectIds)->get();

        return view('student.subjects.take', compact('subjects'));
    }

    
    public function enroll(Subject $subject)
    {
        $student = auth()->user(); 

        
        if (!$student->subjectsTaken->contains($subject->id)) {
            
            $student->subjectsTaken()->attach($subject->id);
        }

        
        return redirect()->route('student.subjects.index')->with('success', 'Subject taken successfully.');
    }


    public function leave(Subject $subject)
    {
        $student = Auth::user(); 

        
        if ($student->subjectsTaken->contains($subject->id)) {
            
            $student->subjectsTaken()->detach($subject->id);
        }

        
        return redirect()->route('student.subjects.index')->with('success', 'Subject left successfully.');
    }


    public function show(Subject $subject)
    {
        $student = Auth::user();
    
        
        $subject->load('students', 'teacher', 'tasks.solutions');
    
        return view('student.subjects.show', compact('subject', 'student'));
    }
}
