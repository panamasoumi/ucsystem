<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<style>
    body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 350px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
</style>
<body>
    <div class="login-container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('varify') }}">
            @csrf
            <label for="email">Email:</label>
            <input class="input" type="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input class="input" type="password" name="password" required>
            <br>
            <label for="roles">Role</label>
            <select class="input" name="role">
                <option value="employee">employee</option> 
                <option value="student">student</option>
                <option value="teacher">teacher</option>   
            </select>
            <button  type="submit">register</button>
        </form>
    </div>
</body>
</html>

