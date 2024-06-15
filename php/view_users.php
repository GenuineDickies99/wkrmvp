<?php
require 'db_connection.php';

function getUsers() {
    global $pdo;
    $query = "SELECT * FROM users";
    $stmt = $pdo->prepare($query);
    
    try {
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Users List</h1>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <?php if (count($users) > 0): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['User_ID']); ?></td>
                    <td><?php echo htmlspecialchars($user['Username']); ?></td>
                    <td><?php echo htmlspecialchars($user['Role']); ?></td>
                    <td><?php echo htmlspecialchars($user['CreatedAt']); ?></td>
                    <td><?php echo htmlspecialchars($user['UpdatedAt']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>