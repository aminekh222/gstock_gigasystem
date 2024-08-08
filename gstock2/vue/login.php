<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_stock_dclick";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header('Location: dashboard.php');
    exit;
} else {
    $_SESSION['error'] = "Invalid email or password";
    header('Location: index.php');
    exit;
}

$stmt->close();
$conn->close();
?>
