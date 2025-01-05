<?php
require_once '../../includes/db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applicantId'])) {
    $applicantId = $_POST['applicantId'];

    // Connect to the database
    $conn = connectDB();

    // Prepare the delete query
    $deleteQuery = "DELETE FROM applicants WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $applicantId);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the admin dashboard
        header("Location: ../dashboard.php");
        exit;
    } else {
        // Handle error
        echo "Error deleting applicant: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the dashboard if accessed improperly
    header("Location: ../dashboard.php");
    exit;
}
