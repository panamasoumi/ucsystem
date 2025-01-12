<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
</head>
<body>
    <h1>Welcome to the Teacher Dashboard</h1>
    <p>Here, you can manage your courses and assignments.</p>
    @foreach($courses as $course)
    <label>
        <input type="checkbox" name="courses[]" value="{{ $course->id }}" 
               @if(in_array($course->id, old('courses', $teacher->courses->pluck('id')->toArray()))) checked @endif>
        {{ $course->name }} ({{ $course->credits }} credits)
    </label><br>
@endforeach
<form action="{{ route('teacher.selectCourses') }}" method="POST">
    @csrf
    <div>
        @foreach($courses as $course)
            <label>
                <input type="checkbox" name="courses[]" value="{{ $course->id }}">
                {{ $course->name }} ({{ $course->credits }} credits)
            </label><br>
        @endforeach
    </div>
    <button type="submit">Select Courses</button>
</form>
</body>
</html>

