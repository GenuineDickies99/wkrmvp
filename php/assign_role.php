<?php
require 'db_connection.php';

function assignRole($user_id, $role) {
    global $pdo;
    
    // If your roles are stored as names directly, you can use the role name directly in the query
    $query = "UPDATE users SET Role = ? WHERE User_ID = ?";
    $stmt = $pdo->prepare($query);

    try {
        return $stmt->execute([$role, $user_id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];

    if (assignRole($user_id, $role)) {
        echo "Role assigned successfully.";
    } else {
        echo "Failed to assign role.";
    }
}
?>
