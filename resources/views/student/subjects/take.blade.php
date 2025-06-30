@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-semibold mb-6">Take a Subject</h1>

                @if ($subjects->isEmpty())
                    <p>No subjects available to take.</p>
                @else
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 p-2">Subject Name</th>
                                <th class="border border-gray-300 p-2">Subject Code</th>
                                <th class="border border-gray-300 p-2">Description</th>
                                <th class="border border-gray-300 p-2">Credit</th>
                                <th class="border border-gray-300 p-2">Teacher Name</th>
                                <th class="border border-gray-300 p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $subject->name }}</td>
                                    <td class="border border-gray-300 p-2">{{ $subject->subject_code }}</td>
                                    <td class="border border-gray-300 p-2">{{ $subject->description }}</td>
                                    <td class="border border-gray-300 p-2">{{ $subject->credit }}</td>
                                    <td class="border border-gray-300 p-2">{{ $subject->teacher->name ?? '-' }}</td>
                                    <td class="border border-gray-300 p-2">
                                        <form action="{{ route('student.subjects.enroll', $subject->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                                                Take
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <div class="mt-6">
                    <a href="{{ url('/dashboard') }}" class="text-blue-600 hover:underline">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
