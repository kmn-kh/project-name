<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .dashboard {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile a img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile h3 {
            margin-bottom: 5px;
        }

        .profile p {
            font-size: 0.9em;
            color: #ccc;
        }

        .sidebar h2 {
            margin: 0 0 16px 22px;
        }

        .sidebar ul {
            list-style-type: none;
            width: 100%;
        }

        .sidebar ul li {
            margin: 8px 0px 8px 22px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #575757;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            overflow-y: auto;
        }

        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border-radius: 4px;
        }

        .content {
            margin-top: 20px;
            display: flex;
            gap: 20px;
        }

        .card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- User Profile -->
            <div class="profile">
                <a href="/show-profile">
                    <img src="{{ asset('uploads/' . (auth()->user()->img ?? 'Default.png')) }}" alt="User Profile">
                </a>
                <h3>{{ auth()->user()->name }}</h3>
                <p>{{ auth()->user()->email }}</p>
            </div>

            <h2>Dashboard</h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navigation -->
            <div class="top-nav">
                <h3>Welcome, {{auth()->user()->name}}</h3>
            </div>

            <!-- Dashboard Content -->
            <div class="content">
                <div class="card">
                    <h3>Card 1</h3>
                    <p>Some content here.</p>
                </div>
                <div class="card">
                    <h3>Card 2</h3>
                    <p>Some content here.</p>
                </div>
                <div class="card">
                    <h3>Card 3</h3>
                    <p>Some content here.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>