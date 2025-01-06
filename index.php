<?php 
require_once './includes/db-connection.php';
$conn = connectDB();
session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];

    $query = "SELECT * FROM users WHERE userId = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
        $_SESSION['role'] = $userData['role'];
        $_SESSION['user'] = $userData;

        if ($userData['role'] === 'applicant') {
            header('Location: ./Pages/HomePage.php');
        } else {
            header('Location: ./Pages/EmployerPage.php');
        }
        exit;
    } else {
        session_unset();
        session_destroy();
        header('Location: ./Pages/LoginPage.php');
        exit;
    }
} else {
    header('Location: ./Pages/LoginPage.php');
    exit;
}
?>
