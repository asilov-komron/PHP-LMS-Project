@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

            <h1 class="text-2xl font-semibold mb-6">Edit Task</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('teacher.tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block font-semibold">Task Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $task->name) }}" required
                        class="w-full p-2 border rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="description" class="block font-semibold">Description:</label>
                    <textarea id="description" name="description" required
                        class="w-full p-2 border rounded mt-1">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="points" class="block font-semibold">Points:</label>
                    <input type="number" id="points" name="points" value="{{ old('points', $task->points) }}"
                        class="w-full p-2 border rounded mt-1">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-red-600 px-4 py-2 rounded text-white">
                        Save Changes
                    </button>
                    <a href="{{ route('teacher.tasks.show', $task->id) }}" class="text-red-600 hover:underline">Cancel</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
