<?php
require_once '../../includes/db-connection.php';
require_once '../../includes/helper-functions.php';

$conn = connectDB();

$successMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $linkedIn = trim($_POST['linkedIn']);

    if (empty($fullname) || empty($username) || empty($email) || empty($phone) || empty($password)) {
        $errorMessage = "All fields except LinkedIn are mandatory.";
    } else {
        $userId = uniqid();

        $query = "INSERT INTO users (userId, fullname, username, email, phone, password, linkedIn, role) VALUES (?, ?, ?, ?, ?, ?, ?, 'admin')";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssssss', $userId, $fullname, $username, $email, $phone, $password, $linkedIn);

        if ($stmt->execute()) {
            header("Location: ../dashboard.php");
            exit;
        } else {
            $errorMessage = "Error adding admin: " . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
