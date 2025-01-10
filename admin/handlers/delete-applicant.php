<?php
require_once '../../includes/db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applicantId'])) {
    $applicantId = $_POST['applicantId'];
    $conn = connectDB();

    $deleteQuery = "DELETE FROM applicants WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $applicantId);

    if ($stmt->execute()) {
        header("Location: ../dashboard.php?section=applicant-list");
        exit;
    } else {
        echo "Error deleting applicant: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect to the dashboard if accessed improperly
    header("Location: ../dashboard.php?section=applicant-list");
    exit;
}
