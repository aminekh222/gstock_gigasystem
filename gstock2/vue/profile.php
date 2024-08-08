
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            padding: 20px;
            position: relative;
        }
        .profile-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .profile-card h2 {
            margin: 10px 0;
            font-size: 24px;
            color: #333;
        }
        .profile-card p {
            color: #666;
        }
        .social-links {
            margin-top: 10px;
        }
        .social-links a {
            margin: 0 10px;
            text-decoration: none;
            color: #007bff;
        }
        .logout-link {
            display: block;
            margin-top: 20px;
            color: #ff4d4d;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="profile-card">
    <img src="../public/images/profile.jpg" alt="Profile Picture">
    <h2>Mohamed</h2>
    <p>Role : Web Developer</p>
    <div class="social-links">
        <a href="dashboard.php">Dashboard</a>
    </div>
    <a href="deconnection.php" class="logout-link">Deconnexion</a>
</div>
</body>
</html>
