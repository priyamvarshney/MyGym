<?php

session_start();

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);
unset($_SESSION['user_mobile']);

//session_destroy();

header("location:index.php");

?>