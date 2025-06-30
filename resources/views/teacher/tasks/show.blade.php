@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-semibold mb-4">{{ $task->name }}</h1>

                <div class="mb-4">
                    <strong>Description:</strong> {{ $task->description }}
                </div>

                <div class="mb-4">
                    <strong>Points:</strong> {{ $task->points ?? 'N/A' }}
                </div>

                <div class="mb-4">
                    <strong>Number of Submitted Solutions:</strong> 0
                </div>

                <div class="mb-4">
                    <strong>Number of Evaluated Solutions:</strong> 0
                </div>



                <div class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">Submitted Solutions</h2>

                    @if($task->solutions->isEmpty())
                        <p>No solutions submitted yet.</p>
                    @else
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 p-2">Submission Date</th>
                                    <th class="border border-gray-300 p-2">Student Name</th>
                                    <th class="border border-gray-300 p-2">Student Email</th>
                                    <th class="border border-gray-300 p-2">Earned Points</th>
                                    <th class="border border-gray-300 p-2">Evaluation Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($task->solutions as $solution)
                                    <tr>
                                        <td class="border border-gray-300 p-2">{{ $solution->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="border border-gray-300 p-2">{{ $solution->student->name }}</td>
                                        <td class="border border-gray-300 p-2">{{ $solution->student->email }}</td>
                                        <td class="border border-gray-300 p-2">
                                            @if ($solution->earned_points === null)
                                                <a href="{{ route('teacher.solutions.evaluate', $solution->id) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                                    Evaluate
                                                </a>
                                            @else
                                                {{ $solution->earned_points }}
                                            @endif
                                        </td>

                                        <td class="border border-gray-300 p-2">
                                            {{ $solution->evaluated_at ? $solution->evaluated_at->format('Y-m-d H:i') : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>














                <div class="mt-4">
                    <a href="{{ route('teacher.tasks.edit', $task->id) }}" class="bg-red-600 px-4 py-2 rounded text-white">
                        Edit Task
                    </a>
                </div>

                <div class="mt-6">
                    <a href="{{ route('teacher.subjects.show', $task->subject_id) }}" class="text-blue-600 hover:underline">
                        Back to Subject
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection