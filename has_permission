function hasPermission($userId, $permission) {
    // Assuming you have a PDO connection $pdo
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM UserPermissions WHERE UserID = ? AND Permission = ?');
    $stmt->execute([$userId, $permission]);
    return $stmt->fetch() !== false;
}

// Example usage:
$userId = 1; // The ID of the user you want to check
if (hasPermission($userId, 'manage_users')) {
    echo "User has permission to manage users.";
} else {
    echo "User does not have permission to manage users.";
}
