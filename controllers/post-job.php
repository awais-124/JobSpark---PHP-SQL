<?php
session_start();
require_once '../includes/db-connection.php';
$conn = connectDB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['job-title'];
    $department = $_POST['department'];
    $duration = $_POST['duration'];
    $level = $_POST['level'];
    $minSalary = $_POST['min-salary'];
    $maxSalary = $_POST['max-salary'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $skills = $_POST['skills'];
    $category = intval($_POST['category']);
    $company = $_POST['company'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $postedBy = $_SESSION['user']['userId'];

    $errors = [];
    if (empty($title) || empty($department) || empty($location) || empty($skills) || empty($company) || empty($description)) {
        $errors[] = "All fields are required.";
    }

    if (!is_numeric($minSalary) || !is_numeric($maxSalary) || $minSalary < 0 || $maxSalary < $minSalary) {
        $errors[] = "Invalid salary range.";
    }

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header("Location: ../Pages/EmployerPage.php");
        exit();
    }

    $query = "INSERT INTO jobs 
            (postedBy, category, title, companyName, location, 
            salaryRange, duration, type, skills, status, description, 
            requirements, department, experience)
            VALUES ('$postedBy', $category, '$title', '$company', 
            '$location', 'PKR $minSalary-$maxSalary', '$duration', 
            '$type', '$skills', 'active', '$description', '$requirements', 
            '$department', '$level')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Job posted successfully!";
        header("Location: ../Pages/EmployerPage.php");
        exit();
    } else {
        $_SESSION['errors'] = ["Error posting job: " . mysqli_error($conn)];
        header("Location: ../Pages/EmployerPage.php");
        exit();
    }
}
?>
