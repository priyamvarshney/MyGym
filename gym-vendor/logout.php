<?php

session_start();

unset($_SESSION['vendor_id']);
unset($_SESSION['vendor_name']);
unset($_SESSION['vendor_email']);
unset($_SESSION['vendor_registration_number']);

//session_destroy();

header("location:index.php");

?>