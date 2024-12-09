<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="{{ route('varify') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="roles">Role</label>
        <select name="role">
            <option value="employee">employee</option> 
            <option value="student">student</option>
            <option value="teacher">teacher</option>   
        </select>
        <button type="submit">register</button>
    </form>
</body>
</html>

