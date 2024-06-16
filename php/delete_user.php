<?php
require 'db_connection.php';
function deleteUser($user_id) {
    global $pdo;
    $query = "DELETE FROM users WHERE User_ID = ?";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([$user_id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    if (deleteUser($user_id)) {
        echo "User deleted successfully.";
    } else {
        echo "Failed to delete user.";
    }
}
?>
