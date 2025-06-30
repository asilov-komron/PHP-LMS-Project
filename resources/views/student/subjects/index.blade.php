@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-semibold mb-4">My Subjects</h1>

                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Subject Name</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Teacher</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)

                            <tr>
                                <td class="border px-4 py-2"><a href="{{ route('student.subjects.show', $subject->id) }}"
                                        class="text-blue-600 hover:underline">
                                        {{ $subject->name }}
                                    </a>
                                </td>
                                <td class="border px-4 py-2">{{ $subject->description }}</td>
                                <td class="border px-4 py-2">{{ $subject->teacher->name }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('student.subjects.leave', $subject->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to leave this subject?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Leave
                                            Subject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6">
                    <a href="{{ url('/dashboard') }}" class="text-blue-600 hover:underline">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection