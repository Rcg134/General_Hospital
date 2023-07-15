<?php
	session_start();
    session_destroy();
    unset($_SESSION['name']);
    unset($_SESSION['fn']);
    unset($_SESSION['ln']);
    unset($_SESSION['iid']);
    unset($_SESSION['usertypeid']);
    unset($_SESSION['username']);
    header('location:Hospitalapp_Login.php');
?>


