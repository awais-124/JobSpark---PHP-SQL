<?php
$user = [];
$name="";
$username="";

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $name = $user['fullname'];
    $username = $user['username'];
} else {
    $name = 'Employer Name';
    $username = 'Your Username';
}
?>

<header class="custom-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <a class="navbar-brand" href="#">
                    <img src="../assets/logos/logo.png" alt="nav-logo">
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <p class="back-fill"><strong><?php echo strtoupper(htmlspecialchars($name)); ?></strong></p>
                        </li>
                        <li class="nav-item">
                            <p class="back-fill">Username:&nbsp;&nbsp;<strong><?php echo htmlspecialchars($username); ?></strong></p>
                        </li>
                        <li class="nav-item">
                            <a class="back-fill red" href="../controllers/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>