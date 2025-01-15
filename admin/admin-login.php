<?php
session_start();
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>

<div class="container">
    <h1>JOBSPARK</h1>
    <h2>Admin Dashboard</h2>
    
    <?php if (!empty($errorMessage)): ?>
        <div class="alert"><?= htmlspecialchars($errorMessage) ?></div>
    <?php endif; ?>
    
    <form method="POST" action="./handlers/check-admin-login.php">
        <div class="form-group">
            <!-- <label for="username" class="form-label">Username</label> -->
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
        </div>
        
        <div class="form-group">
            <!-- <label for="password" class="form-label">Password</label> -->
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn">Login</button>
        <a href="../Pages/LoginPage.php" class="link">Applicant/Employer Login</a>
    </form>
</div>

</body>
</html>
