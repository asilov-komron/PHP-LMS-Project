@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-4">

        <h1 class="text-2xl font-bold mb-4">{{ $task->name }}</h1>

        <div class="bg-white p-6 rounded shadow">
            <p><strong>Subject:</strong> {{ $task->subject->name }}</p>
            <p><strong>Teacher:</strong> {{ $task->subject->teacher->name }} ({{ $task->subject->teacher->email }})</p>
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p><strong>Points:</strong> {{ $task->points }}</p>
        </div>

        <div class="mt-6 bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Submit Your Solution</h2>

            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('student.tasks.submit', $task) }}">
                @csrf
                <div class="mb-4">
                    <textarea name="content" class="w-full p-2 border rounded" rows="6"
                        placeholder="Write your solution here..." required>{{ old('content') }}</textarea>

                    @error('content')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Submit Solution
                </button>
            </form>
        </div>

        @if($studentSolutions->count())
            <div class="mt-6 bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Your Previous Submissions</h2>

                <ul class="list-disc pl-6">
                    @foreach ($studentSolutions as $solution)
                        <li class="mb-2">
                            <strong>{{ $solution->created_at->format('d M Y H:i') }}:</strong>
                            {{ $solution->content }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-6">
            <a href="{{ url('/dashboard') }}" class="text-blue-600 hover:underline">Go Back</a>
        </div>
    </div>
@endsection