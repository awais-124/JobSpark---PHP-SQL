<?php

require_once '../../includes/db-connection.php';
require_once '../../includes/helper-functions.php';


$conn = connectDB();

// Fetch all users except admin
$query = "SELECT userId, fullname, username, email, phone, role FROM users WHERE role != 'admin'";
$result = $conn->query($query);

$users = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$i=0;

$conn->close();
?>

<div class="container mt-4">
    <h3 class="mb-4">User List</h3>
    <?php if (!empty($users)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?=++$i;?></td>
                            <td><?= htmlspecialchars($user['fullname']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['phone']) ?></td>
                            <td><?= htmlspecialchars($user['role']) ?></td>
                            <td>
                                <form method="POST" action="../../jobSpark/admin/handlers/delete-user.php" class="d-inline">
                                    <input type="hidden" name="deleteUserId" value="<?= htmlspecialchars($user['userId']) ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-muted">No users found.</p>
    <?php endif; ?>
</div>
