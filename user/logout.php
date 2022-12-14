<?php
session_start();
session_destroy();
setcookie('emailcookie', '', time()-604800);
setcookie('passwordcookie', '', time()-604800);
header('location:./signin.php');
?>