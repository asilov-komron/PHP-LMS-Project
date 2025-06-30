<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    
    public function index()
    {
        $subjects = Subject::where('teacher_id', auth()->id())->get();
        return view('teacher.subjects.index', compact('subjects'));
    }

    
    public function create()
    {
        return view('teacher.subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'subject_code' => [
                'required',
                'string',
                'unique:subjects',
                'regex:/^IK-[A-Z]{3}[0-9]{3}$/'
            ],
            'credit_value' => 'required|integer',
        ]);

        Subject::create([
            'name' => $validated['name'],
            'description' => $validated['description'], 
            'subject_code' => $validated['subject_code'],
            'credit_value' => $validated['credit_value'],
            'teacher_id' => auth()->id(),
        ]);

        return redirect()->route('teacher.subjects.index')->with('success', 'Subject created successfully!');
    }


    public function show($id)
    {
        
        $subject = Subject::with('students', 'tasks')->findOrFail($id);

        
        return view('teacher.subjects.show', compact('subject'));
    }


    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('teacher.subjects.edit', compact('subject'));
    }

    
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        
        $validated = $request->validate([
            'name' => 'required|min:3',
            'subject_code' => 'required|regex:/^[A-Z]{2}-[A-Z]{3}\d{3}$/', 
            'description' => 'required',
            'credit_value' => 'required|numeric',
        ]);

        
        $subject->update([
            'name' => $validated['name'],
            'subject_code' => $validated['subject_code'],
            'description' => $validated['description'],
            'credit_value' => $validated['credit_value'],
        ]);

        


        
        return redirect()->route('teacher.subjects.show', $subject->id)->with('success', 'Subject updated successfully!');
    }


    public function destroy(Subject $subject)
    {
        
        $subject->delete();

        
        return redirect()->route('teacher.subjects.index')->with('success', 'Subject deleted successfully.');
    }



    
    
    
    
    
    

    
    
    
    
    
    

    
    
    
    
    
    
}
