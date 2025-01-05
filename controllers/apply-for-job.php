<?php
session_start();
require_once "../includes/db-connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectDB();
    // mysqli_real+escape_string is used to get rid of 
    // some characters that can lead to SQL Injection attack
    // this functions removes them and helps maintain security
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $jobId = mysqli_real_escape_string($conn, $_POST['jobId']);
    $experience = intval($_POST['experience']);
    $joiningDate = mysqli_real_escape_string($conn, $_POST['joiningDate']);
    $coverLetter = mysqli_real_escape_string($conn, $_POST['coverLetter']);

    if (!empty($_FILES['cv']['name'])) {
        $cvName = $_FILES['cv']['name'];
        $cvTarget = "../uploaded-files/" . $cvName;
        if (move_uploaded_file($_FILES['cv']['tmp_name'], $cvTarget)) {
            $cvPath = $cvName;
        } else {
            echo "<script>alert('CV upload failed.')</script>";
            header('Location: JobApplication.php');
        }
    } else {
        echo "<script>alert('CV is required.')</script>";
        header('Location: JobApplication.php');
    }

    $sql = "INSERT INTO applicants (userId, jobId, cv, status, experience, joiningDate, coverLetter) 
            VALUES ('$userId', '$jobId', '$cvPath', 'new', '$experience', '$joiningDate', '$coverLetter')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Application submitted successfully!');</script>";
        header('Location: ../Pages/HomePage.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    die("Invalid request method.");
}
?>
