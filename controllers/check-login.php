<?php
session_start();
require_once '../includes/db-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectDB();
    
    $username = $_POST['username'];
    $password = $_POST['password']; 
    
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        $_SESSION['userId'] = $user['userId'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['user'] = $user; 

        if ($user['role'] === 'employer') {
            header("Location: ../Pages/EmployerPage.php");
        } else {
            header("Location: ../Pages/HomePage.php");
        }
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: ../Pages/LoginPage.php");
        exit();
    }

    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
