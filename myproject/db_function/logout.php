<?php
session_start();
session_unset();
session_destroy();
header("Location: ../user/login-register-user/login.php"); 
exit();
?>
