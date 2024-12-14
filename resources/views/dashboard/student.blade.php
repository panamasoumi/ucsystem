<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome to the Student Dashboard</h1>
    <p>Here, you can view and select your courses.</p>
    <h1>Student Dashboard</h1>
<form method="POST" action="{{ route('student.selectCourse') }}">
    @csrf
    @foreach ($courses as $course)
    <div>
        <input type="checkbox" name="courses[]" value="{{ $course->id }}">
        {{ $course->name }} ({{ $course->units }} units)
    </div>
    @endforeach
    <button type="submit">Select Courses</button>
</form>
</body>
</html>

