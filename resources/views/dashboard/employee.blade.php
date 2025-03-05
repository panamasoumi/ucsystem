@extends('layouts.app')

@section('content')
    <h1>Employee Dashboard</h1>

    <section>
        <h2>Courses for New Semester</h2>
        @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        @endif


        @if(empty($courses) || $courses->isEmpty())
            <p>No courses available for the new semester.</p>
        @else
            <ul>
                @foreach($courses as $course)
                    <li>{{ $course->name }} (Code: {{ $course->code }})</li>
                @endforeach
            </ul>
        @endif
    
        <hr>
    
        <h3>Add New Course</h3>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <label for="name">Course Name:</label>
            <input type="text" name="course_name" id="course_name" required>
    
            <label for="code">Course Code:</label>
            <input type="text" name="course_code" id="course_code" required>

            <label for="credit">Credit:</label>
            <input type="number" name="credit" id="credit" required>

            <label for="semester">Semester:</label>
            <input type="text" name="semester" id="semester" required>
        
    
            <button type="submit">Add Course</button>
        </form>

        
    </section>
    

    <hr>

    <section>
        <h2>Users (Students and Teachers)</h2>
        @if(isset($users) && $users->isNotEmpty())
            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>{{ ucfirst($user->status) }}</td>
                            <td>
                                @if($user->status === 'pending')
                                    <form action="{{ route('employee.approveUser', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit">Approve</button>
                                    </form>
                                    <form action="{{ route('employee.rejectUser', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit">Reject</button>
                                    </form>
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No users found.</p>
        @endif
    </section>
@endsection

