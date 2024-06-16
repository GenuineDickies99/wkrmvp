<?php
require 'db_connection.php';

function getUsers($role = null) {
    global $pdo;
    if ($role) {
        $query = "SELECT * FROM users WHERE Role = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$role]);
    } else {
        $query = "SELECT * FROM users";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$role = isset($_GET['role']) ? $_GET['role'] : null;
$users = getUsers($role);

if (count($users) > 0): ?>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['User_ID']); ?></td>
                <td><?php echo htmlspecialchars($user['Username']); ?></td>
                <td><?php echo htmlspecialchars($user['Role']); ?></td>
                <td><?php echo htmlspecialchars($user['CreatedAt']); ?></td>
                <td><?php echo htmlspecialchars($user['UpdatedAt']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>
