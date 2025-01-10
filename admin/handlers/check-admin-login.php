<?php
session_start();
require_once '../../includes/db-connection.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Both fields are required!";
        header("Location: ../admin-login.php");
    } else {
        // Check credentials in the database
        $conn = connectDB();
        $query = "SELECT * FROM users WHERE username = ? AND role = 'admin'";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin && $admin['password'] == $password) {
            // Set session variables
            $_SESSION['admin'] = [
                'userId' => $admin['userId'],
                'fullname' => $admin['fullname'],
                'username' => $admin['username'],
                'email' => $admin['email']
            ];
            header("Location: ../dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Invalid username or password!";
            header("Location: ../admin-login.php");
        }
        $stmt->close();
        $conn->close();
    }
} else {
    header("Location: ../admin-login.php");
}
?>
