<?php
require_once '../../includes/db-connection.php';

$conn = connectDB();

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'delete' && isset($_POST['featuredId'])) {
        $featuredId = intval($_POST['featuredId']);
        $deleteQuery = "DELETE FROM featuredJobs WHERE id = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param('i', $featuredId);
        $stmt->execute();
        header("Location: ../dashboard.php?section=featured-jobs");
        exit;
    } elseif ($_POST['action'] === 'add' && isset($_POST['jobId'])) {
        $jobId = intval($_POST['jobId']);
        $insertQuery = "INSERT INTO featuredJobs (jobId) VALUES (?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param('i', $jobId);
        $stmt->execute();
        header("Location: ../dashboard.php?section=featured-jobs");
        exit;
    }
}

$conn->close();
?>
