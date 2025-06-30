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

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl mb-4">Create New Task for: {{ $subject->name }}</h1>

                        <form action="{{ route('teacher.tasks.store', $subject->id) }}" method="POST" class="space-y-4">
                            @csrf

                            <div>
                                <label for="name" class="block font-medium">Task Name</label>
                                <input type="text" name="name" id="name" class="w-full border p-2 rounded-md" value="{{ old('name') }}" required>
                            </div>

                            <div>
                                <label for="description" class="block font-medium">Description</label>
                                <textarea name="description" id="description" class="w-full border p-2 rounded-md" rows="4" required>{{ old('description') }}</textarea>
                            </div>

                            <div>
                                <label for="points" class="block font-medium">Points</label>
                                <input type="number" name="points" id="points" class="w-full border p-2 rounded-md" value="{{ old('points') }}">
                            </div>

                            <div>
                                <button type="submit" class="mt-3 w-1/2 bg-red-600 text-white p-2 rounded-md hover:bg-blue-700">
                                    Create Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-1">
            <a href="{{ route('teacher.subjects.show', $subject->id) }}">
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
