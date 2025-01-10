<?php
require_once '../../includes/db-connection.php';
require_once '../../includes/helper-functions.php';

session_start();
$conn = connectDB();

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = trim($_POST['category']);
    $count = 0;

    if (empty($category)) {
        $errorMessage = "Category Name is empty";
    } else {

        $query = "INSERT INTO categories (title, numberOfJobs) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $category, $count);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Category Has been created";
            header("Location: ../dashboard.php?section=category-list");
            exit;
        } else {
            $errorMessage = "Error adding category: " . $conn->error;
        }

        $stmt->close();
    }
}
$_SESSION['error'] = $errorMessage;
$conn->close();
?>
