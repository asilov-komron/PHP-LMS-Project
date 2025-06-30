@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Evaluate Solution</h1>

        <div class="mb-4">
            <strong>Task:</strong> {{ $solution->task->name }}
        </div>

        <div class="mb-4">
            <strong>Task Description:</strong> {{ $solution->task->description }}
        </div>

        <div class="mb-4">
            <strong>Submitted Solution:</strong>
            <div class="p-4 bg-gray-100 rounded">{{ $solution->content }}</div> <!-- assuming solution has a 'content' field -->
        </div>

        <form action="{{ route('teacher.solutions.storeEvaluation', $solution->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="earned_points" class="block font-semibold mb-2">Earned Points (0 - {{ $solution->task->points }})</label>
                <input type="number" name="earned_points" id="earned_points" 
                       class="w-full border-gray-300 rounded-md shadow-sm"
                       min="0" max="{{ $solution->task->points }}" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Submit Evaluation
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
