<?php
require 'db_connection.php';

function createUser($username, $password, $role) {
    global $pdo;
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (Username, Password, Role, CreatedAt, UpdatedAt) VALUES (?, ?, ?, NOW(), NOW())";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([$username, $password_hash, $role]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if (createUser($username, $password, $role)) {
        echo "User created successfully.";
    } else {
        echo "Failed to create user.";
    }
}
?>
