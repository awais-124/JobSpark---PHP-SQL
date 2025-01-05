<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit;
}

header("Location: ./dashboard.php");
exit;
?>
