<?php
require 'db_connection.php';
function loginUser($username, $password) {
    global $pdo;
    $query = "SELECT * FROM users WHERE Username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['Password'])) {
        return $user;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($user = loginUser($username, $password)) {
        echo "Login successful. Welcome, " . $user['Username'];
    } else {
        echo "Invalid username or password.";
    }
}
?>