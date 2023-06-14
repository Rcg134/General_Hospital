<?php
	session_start();
    session_destroy();
    unset($_SESSION['name']);
    header('location:Hospitalapp_Login.php');

?>


