<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group span{
            color: red;
            font-size: 14px;
            font-weight: 500;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        .toggle-link {
            text-align: center;
        }
        .toggle-link a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="name" value="{{ old('name') }}" required>
                <span>{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                <span>{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" required>
                <span>{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                <span>{{ $errors->first('password') }}</span>
            </div>
            <button type="submit">Register</button>
        </form>
        <br>
        <div class="toggle-link mt-5 bg-red-500">
            <a href="/login" >Already have an account? Login</a>
        </div>
    </div>
</body>

</html>