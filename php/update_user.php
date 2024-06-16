<?php
require 'db_connection.php';
function updateUser($user_id, $username, $role) {
    global $pdo;
    $query = "UPDATE users SET Username = ?, Role = ?, UpdatedAt = NOW() WHERE User_ID = ?";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([$username, $role, $user_id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    if (updateUser($user_id, $username, $role)) {
        echo "User updated successfully.";
    } else {
        echo "Failed to update user.";
    }
}
?>