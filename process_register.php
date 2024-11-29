?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$conn->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
$_SESSION['user'] = $email;
header("Location: index.php");
exit();
?>