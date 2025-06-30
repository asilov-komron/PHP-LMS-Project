@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-4">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-semibold mb-4">Subject Details</h1>

                        <div class="mb-4">
                            <strong>Name:</strong> {{ $subject->name }}
                        </div>

                        <div class="mb-4">
                            <strong>Subject Code:</strong> {{ $subject->subject_code }}
                        </div>

                        <div class="mb-4">
                            <strong>Description:</strong> {{ $subject->description }}
                        </div>

                        <div class="mb-4">
                            <strong>Credit Value:</strong> {{ $subject->credit_value }}
                        </div>

                        <div class="mb-4">
                            <strong>Created At:</strong> {{ $subject->created_at->format('F j, Y, g:i a') }}
                        </div>

                        <div class="mb-4">
                            <strong>Last Modified:</strong> {{ $subject->updated_at->format('F j, Y, g:i a') }}
                        </div>

                        <div class="mb-4">
                            <strong>Number of Students:</strong> {{ $subject->students->count() }}
                        </div>


                        <!-- Task List -->
                        <h2 class="text-xl font-semibold mt-6 mb-4">Tasks</h2>
                        @if ($subject->tasks->count() > 0)
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2 text-left">Task Name</th>
                                        <th class="px-4 py-2 text-left">Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subject->tasks as $task)
                                        <tr>
                                            <td class="px-4 py-2 border">
                                                <a href="{{ route('teacher.tasks.show', $task->id) }}"
                                                    class="text-blue-600 hover:underline">
                                                    {{ $task->name }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-2 border">{{ $task->points ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="mt-4">No tasks have been assigned to this subject yet.</p>
                        @endif

                        <h2 class="text-xl font-semibold mt-6 mb-4">List of Students</h2>
                        <ul class="space-y-2">
                            @foreach ($subject->students as $student)
                                <li class="bg-gray-100 p-4 rounded-md shadow-sm">
                                    <strong>{{ $student->name }}</strong> ({{ $student->email }})
                                </li>
                            @endforeach
                        </ul>

                        <!-- Soft delete form -->
                        <form action="{{ route('teacher.subjects.destroy', $subject->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 text-white p-2 rounded-md hover:bg-red-700">
                                Delete Subject
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>



        <div class="py-1">
            <a href="{{ route('teacher.tasks.create', $subject->id) }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            New Task+
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <!-- Edit Subject Button -->
        <div class="py-1">
            <a href="{{ route('teacher.subjects.edit', $subject->id) }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            Edit Subject
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <!-- Go Back Button -->
        <div class="py-1">
            <a href="{{ route('teacher.subjects.index') }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            Go Back
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection