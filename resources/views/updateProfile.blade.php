<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .update-profile-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .update-profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .update-profile-container .form-group {
            margin-bottom: 20px;
        }

        .update-profile-container label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        .update-profile-container input[type="text"],
        .update-profile-container input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .update-profile-container input[type="file"] {
            padding: 5px;
        }

        .update-profile-container .form-group img {
            display: block;
            margin: 10px auto;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .update-profile-container button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .update-profile-container button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <div class="update-profile-container">

        <h2>Update Profile</h2>
        <form action="update-profile/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Spoofing the PUT method -->
            <!-- Profile Picture -->
            <div class="form-group">
                <label for="profile-picture">Profile Picture</label>
                <img src="{{ asset('uploads/' . (auth()->user()->img ?? 'Default.png')) }}"
                    alt="Current Profile Picture">
                <input type="file" id="img" name="img">
                <span>{{ $errors->first('img') }}</span>
            </div>
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}">
                <span>{{ $errors->first('name') }}</span>
            </div>
            <!-- Submit Button -->
            <button type="submit">Update Profile</button>
        </form>

    </div>

</body>

</html>