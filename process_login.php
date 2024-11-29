<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
if ($result->num_rows > 0) {
    $_SESSION['user'] = $email;
    header("Location: index.php");
    exit();
} else {
    echo "Sai thông tin đăng nhập";
}
?>
