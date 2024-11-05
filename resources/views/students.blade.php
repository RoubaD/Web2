<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Student Management</h1>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="/students" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>
            <div class="form-group">
                <label for="nbOfCredits">Number of Credits</label>
                <input type="number" name="nbOfCredits" id="nbOfCredits" required class="form-control">
            </div>
            <div class="form-group">
                <label for="is_registered">Registered</label>
                <select name="is_registered" id="is_registered" required class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>

        <h3 class="mt-5">Students List</h3>
        <ul id="studentsList" class="list-group">
            @foreach($students as $student)
                <li class="list-group-item">
                    {{ $student->name }} - {{ $student->nbOfCredits }} credits - Registered: {{ $student->is_registered }}
                    <a href="/students/{{ $student->id }}" class="btn btn-info btn-sm float-right">View</a>
                </li>
            @endforeach
        </ul>

        <h4 class="mt-5">Filter Students</h4>
        <a href="{{ route('students.credits.gt100') }}" class="btn btn-warning">Credits Greater Than 100</a>
        <a href="{{ route('students.credits.lt50') }}" class="btn btn-warning">Credits < 50 or Not Registered</a>
        <a href="{{ route('students.max.credits') }}" class="btn btn-warning">Max Credits</a>
    </div>
</body>
</html>
