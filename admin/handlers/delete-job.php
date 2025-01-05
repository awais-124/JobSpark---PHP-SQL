<?php
require_once '../../includes/db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jobId'])) {
    $jobId = $_POST['jobId'];

    // Connect to the database
    $conn = connectDB();

    // Prepare the delete query
    $deleteQuery = "DELETE FROM jobs WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $jobId);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the job list view
        header("Location: ../dashboard.php");
        exit;
    } else {
        // Handle error
        echo "Error deleting job: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the job list if accessed improperly
    header("Location: ../dashboard.php");
    exit;
}
