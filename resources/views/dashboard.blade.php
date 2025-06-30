@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection


<!--Teacher Part-->
@section('content')

    @if (Auth::user()->role === 'teacher')
        <div class="py-6">
            <a href="{{ url('/teacher/subjects') }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            My Subjects
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- New subject button -->

        <div class="">
            <a href="{{ url('/teacher/subjects/create') }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            New Subject +
                        </div>
                    </div>
                </div>
            </a>
        </div>

<!-- Student part -->
    @elseif (Auth::user()->role === 'student')
        <div class="py-6">
            <a href="{{ route('student.subjects.index') }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            My Subjects
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Take subject button part -->

        <div class="">
            <a href="{{ route('student.subjects.take') }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            Take Subject +
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @else
        <p>You do not have a valid role assigned.</p>
    @endif
@endsection