function getUserRole($userId) {
    // Assuming you have a PDO connection $pdo
    global $pdo;

    $stmt = $pdo->prepare('SELECT Role FROM Users WHERE ID = ?');
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    return $user ? $user['Role'] : null;
}

// Example usage:
$userId = 1; // The ID of the user you want to check
$role = getUserRole($userId);

if ($role === 'Admin') {
    echo "User is an Admin.";
} elseif ($role === 'Technician') {
    echo "User is a Technician.";
} else {
    echo "User is a standard User.";
}
