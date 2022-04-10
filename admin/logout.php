<?php

session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['admin_name']);
unset($_SESSION['admin_email']);
unset($_SESSION['admin_registration_number']);
//session_destroy();

header("location:index.php");

?>