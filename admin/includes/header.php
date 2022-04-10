<?php
include('database.php');
session_start();

if(!isset($_SESSION["admin_registration_number"])){
      header("location:index.php");
    }

$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
$admin_email = $_SESSION['admin_email'];
$admin_registration_number = $_SESSION['admin_registration_number'];

$query = "SELECT * FROM customer_order INNER JOIN order_payments ON customer_order.orderId = order_payments.orderId WHERE transaction_status = 'SUCCESS'";
$fetch = mysqli_query($con,$query);
$count = 0;
$count = mysqli_num_rows($fetch);
$total_earnings = 0;
While($find=mysqli_fetch_array($fetch))
{
  $total_earnings = $total_earnings + $find['orderAmount'];
}

$queryes = "SELECT * FROM customer_order INNER JOIN order_payments ON customer_order.orderId = order_payments.orderId WHERE transaction_status = 'SUCCESS'";
$fetches = mysqli_query($con,$queryes);
$current_balance = 0;
$current_balance_without_charge = 0;
While($findes=mysqli_fetch_array($fetches))
{
  $current_balance_without_charge = $current_balance_without_charge + $findes['orderAmount'];
}
$current_balance = $current_balance_without_charge*10/100;

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin -> Dashboard | DGM</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">