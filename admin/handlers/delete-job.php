<?php
require_once '../../includes/db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jobId'])) {
    $jobId = $_POST['jobId'];

    $conn = connectDB();

    $deleteQuery = "DELETE FROM jobs WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $jobId);

    if ($stmt->execute()) {
        header("Location: ../dashboard.php?section=job-list");
        exit;
    } else {
        echo "Error deleting job: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: ../dashboard.php?section=job-list");
    exit;
}
