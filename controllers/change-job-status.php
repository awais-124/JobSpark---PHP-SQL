<?php
require_once '../includes/db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['jobId'])) {
        $conn = connectDB();
        $jobId = intval($_POST['jobId']);
        $query = "UPDATE jobs SET status = 'closed' WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $jobId);

        if ($stmt->execute()) {
            header("Location: ../Pages/EmployerPage.php");
            exit;
        } else {
            header("Location: ../Pages/EmployerPage.php");
            exit;
        }
    }
}

header("Location: ../Pages/EmployerPage.php");
exit;
?>
