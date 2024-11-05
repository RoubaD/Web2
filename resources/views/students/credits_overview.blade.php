<!-- resources/views/students/credits_overview.blade.php -->

@extends('layouts.app') <!-- Change this if your layout file is named differently -->

@section('content')
    <div class="container">
        <h1>Students Credit Overview</h1>

        <h2>Students with Credits Greater than 100</h2>
        @if($studentsGreaterThan100->isEmpty())
            <p>No students found with credits greater than 100.</p>
        @else
            <ul class="list-group">
                @foreach ($studentsGreaterThan100 as $student)
                    <li class="list-group-item">
                        ID: {{ $student->id }} - Name: {{ $student->name }} - Credits: {{ $student->nbOfCredits }} - Registered: {{ $student->is_registered ? 'Yes' : 'No' }}
                    </li>
                @endforeach
            </ul>
        @endif

        <h2>Students with Credits Less than 50 or Not Registered</h2>
        @if($studentsLessThan50->isEmpty())
            <p>No students found with credits less than 50 or not registered.</p>
        @else
            <ul class="list-group">
                @foreach ($studentsLessThan50 as $student)
                    <li class="list-group-item">
                        ID: {{ $student->id }} - Name: {{ $student->name }} - Credits: {{ $student->nbOfCredits }} - Registered: {{ $student->is_registered ? 'Yes' : 'No' }}
                    </li>
                @endforeach
            </ul>
        @endif

        <h2>Student with Maximum Credits</h2>
        @if($maxCreditStudent)
            <p>ID: {{ $maxCreditStudent->id }} - Name: {{ $maxCreditStudent->name }} - Credits: {{ $maxCreditStudent->nbOfCredits }} - Registered: {{ $maxCreditStudent->is_registered ? 'Yes' : 'No' }}</p>
        @else
            <p>No students found.</p>
        @endif
    </div>
@endsection
