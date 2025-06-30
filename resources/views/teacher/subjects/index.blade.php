@extends('layouts.app')

@section('content')

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl mb-4">My Subjects</h1>


                    <ul class="space-y-2">
                        @foreach($subjects as $subject)

                            <li class="bg-gray-100 p-4 rounded-md shadow-sm hover:bg-gray-200">
                                <a href="{{ route('teacher.subjects.show', $subject) }}" class="block">

                                    <strong>{{ $subject->name }}</strong> ({{ $subject->subject_code }})
                                    <div class="mt-2 text-sm text-gray-600">
                                        <strong>Description:</strong> {{ $subject->description }}
                                    </div>
                                </a>

                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="py-1">
        <a href="{{ url('/dashboard') }}">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Go Back
                    </div>
                </div>
            </div>
        </a>
    </div>

@endsection