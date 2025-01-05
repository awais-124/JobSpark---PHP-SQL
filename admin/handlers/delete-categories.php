<?php
require_once '../../includes/db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryId'])) {
    $categoryId = intval($_POST['categoryId']);
    $conn = connectDB();

    $query = "DELETE FROM categories WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $categoryId);

    if ($stmt->execute()) {
        header("Location: ../dashboard.php");
        exit;
    } else {
        header("Location: ../dashboard.php");
    }

    $stmt->close();
    $conn->close();
}
?>
