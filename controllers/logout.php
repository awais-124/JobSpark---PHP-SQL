<?php

session_start();

unset($_SESSION['userId']);
unset($_SESSION['role']);
unset($_SESSION['user']); 

header('Location: ../Pages/LoginPage.php');
exit;
?>
