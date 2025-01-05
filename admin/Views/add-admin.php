<?php
require_once '../../includes/db-connection.php';
require_once '../../includes/helper-functions.php';

$successMessage = "";
$errorMessage = "";

if (isset($_GET['success'])) {
    $successMessage = "New admin added successfully!";
} elseif (isset($_GET['error'])) {
    $errorMessage = "Error adding admin.";
}

?>

<div class="container">
    <h3 class="my-3">Add New Admin</h3>
    <?php if (!empty($successMessage)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
    <?php endif; ?>
    <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
    <?php endif; ?>

    <form method="POST" action="../../jobSpark/admin/handlers/new-admin.php">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>
        <div class="mb-3">
            <label for="linkedIn" class="form-label">LinkedIn (optional)</label>
            <input type="text" class="form-control" id="linkedIn" name="linkedIn" placeholder="LinkedIn profile link">
        </div>
        <button type="submit" class="btn btn-primary">Add Admin</button>
    </form>
</div>
