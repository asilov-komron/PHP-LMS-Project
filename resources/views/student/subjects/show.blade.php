@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto p-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 text-gray-900">
                <h1 class="text-3xl font-bold mb-4">{{ $subject->name }}</h1>

                <div class="mb-2"><strong>Description:</strong> {{ $subject->description }}</div>
                <div class="mb-2"><strong>Code:</strong> {{ $subject->subject_code }}</div>
                <div class="mb-2"><strong>Credit Value:</strong> {{ $subject->credit }}</div>
                <div class="mb-2"><strong>Created At:</strong> {{ $subject->created_at->format('Y-m-d H:i') }}</div>
                <div class="mb-2"><strong>Last Updated At:</strong> {{ $subject->updated_at->format('Y-m-d H:i') }}</div>
                <div class="mb-2"><strong>Number of Students:</strong> {{ $subject->students->count() }}</div>

                <div class="mt-4">
                    <h2 class="text-2xl font-semibold mb-2">Teacher</h2>
                    <p><strong>Name:</strong> {{ $subject->teacher->name }}</p>
                    <p><strong>Email:</strong> {{ $subject->teacher->email }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-semibold mb-4">Students who took this subject</h2>

                @if ($subject->students->isEmpty())
                    <p>No students have taken this subject yet.</p>
                @else
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 p-2">Name</th>
                                <th class="border border-gray-300 p-2">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject->students as $student)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $student->name }}</td>
                                    <td class="border border-gray-300 p-2">{{ $student->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-semibold mb-4">Tasks for this Subject</h2>

                @if ($subject->tasks->isEmpty())
                    <p>No tasks available for this subject yet.</p>
                @else
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 p-2">Task Name</th>
                                    <th class="border border-gray-300 p-2">Points</th>
                                    <th class="border border-gray-300 p-2">Submission Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject->tasks as $task)
                                                <tr>
                                                    <td class="border border-gray-300 p-2">
                                                        <a href="{{ route('student.tasks.show', $task) }}" class="text-blue-600 hover:underline">
                                                            {{ $task->name }}
                                                        </a>
                                                    </td>
                                                    <td class="border border-gray-300 p-2">{{ $task->points }}</td>
                                                    <td class="border border-gray-300 p-2">
                                                        @php
                                                            $submitted = $task->solutions->where('user_id', $student->id)->isNotEmpty();
                                                        @endphp
                                                        @if ($submitted)
                                                            <span class="text-green-600 font-semibold">Submitted</span>
                                                        @else
                                                            <span class="text-red-600 font-semibold">Not Submitted</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                @endif
            </div>
        </div>


        <div class="mt-6">
            <a href="{{ route('student.subjects.index') }}" class="text-blue-600 hover:underline">
                ← Back to My Subjects
            </a>
        </div>
    </div>
@endsection