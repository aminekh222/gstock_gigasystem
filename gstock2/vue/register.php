<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];

  $errorMessage = ""; // Initialize empty error message

  if (empty($email) || empty($password) || empty($confirmPassword)) {
    $errorMessage = "Tous les champs sont requis."; // "All fields are required." in French
  } elseif ($password !== $confirmPassword) {
    $errorMessage = "Les mots de passe ne correspondent pas."; // "Passwords do not match." in French
  } else {
    $db = new mysqli('localhost', 'root', '', 'gestion_stock_dclick');

    if ($db->connect_error) {
      die("Échec de la connexion : " . $db->connect_error); // "Connection failed" in French
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $errorMessage = "Cet email est déjà enregistré."; // "Email is already registered." in French
    } else {
      
      $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
      $stmt = $db->prepare($sql);
      $stmt->bind_param('ss', $email, $password);

      if ($stmt->execute()) {
        $_SESSION['user_id'] = $db->insert_id;
        header('Location: dashboard.php');
        exit;
      } else {
        $errorMessage = "Erreur : " . $stmt->error; // "Error" in French
      }
    }

    $db->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GIGA SYSTEM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        img {
            width: 400px; 
            height: auto; 
            margin-bottom:40px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: rgb(6, 183, 233);
            color: white;
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .login-link {
            margin-top: 15px;
            display: block;
            color: rgb(6, 183, 233);
            text-decoration: none;
            font-size: 14px;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <img src="../public/images/gigasystemphoto.png" alt="GIGA_SYSTEM">
    <div class="container">
        <h1>Register</h1>
        <?php if (isset($errorMessage)): ?>
            <div class="error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <form action="register.php" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Register</button>
            <a href="index.php" class="login-link">Back to Login</a>
        </form>
    </div>
</body>
</html>
