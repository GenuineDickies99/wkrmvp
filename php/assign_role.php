<?php
require 'db_connection.php';

function assignRole($user_id, $role_id) {
    global $pdo; // Ensure the global $pdo variable is used

    // Update the user's role
    $query = "UPDATE Users SET role_id = ? WHERE user_id = ?";
    $stmt = $pdo->prepare($query);

    try {
        return $stmt->execute([$role_id, $user_id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>