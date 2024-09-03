<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 10cm;
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            color: #666;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .input-group span {
            color: red;
            font-size: 14px;
            font-weight: 500;
        }

        .alert {
            text-align: center;
        }

        .alert span {
            color: red;
            font-size: 16px;
            font-weight: 600;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .toggle-link {
            text-align: center;
        }

        .toggle-link a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        @if(session('error'))
            <div class="alert alert-danger">
                <span>{{ session('error') }}</span>
            </div>
        @endif
        @if($errors->has('message'))
            <div class="alert alert-danger">
                <span>{{ $errors->first('message') }}</span>
            </div>
        @endif
        <form class="login-form" action="/login" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Email</label>
                @php 
                    $rememberEmail;
                    if ($errors->first('dataEmail')) {
                        $rememberEmail = $errors->first('dataEmail');
                    } else {
                        $rememberEmail = old('email');
                    }
                @endphp
                <input type="text" id="name" name="email" value="{{ $rememberEmail }}">
                <span>{{ $errors->first('email') }}</span>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}">
                <span>{{ $errors->first('password') }}</span>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <br>
        <div class="toggle-link">
            <a href="/register">Don't have account? Register</a>
        </div>
    </div>
</body>

</html>