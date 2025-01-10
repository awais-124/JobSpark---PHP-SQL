<?php
require_once '../../includes/db-connection.php';

$conn = connectDB();

// Check if delete request is valid
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteUserId'])) {
    $deleteUserId = $_POST['deleteUserId'];

    // Prepare the delete query
    $deleteQuery = "DELETE FROM users WHERE userId = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('s', $deleteUserId);

    if ($stmt->execute()) {
        header("Location: ../dashboard.php?section=applicant-list");
        exit;
    } else {
        $error = "Failed to delete user.";
    }
}

$conn->close();
?>
