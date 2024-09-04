<?php 
include('./config/constants.php');
include('login-check.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Treasure Admin - Home Page</title>
    <link rel="stylesheet" href="Admin_css/admin_style.css">
</head>
<body>
<!--Main section starts-->
<div class="menu text-center">
    <div class="wrapper">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="manage-admin.php">Admin</a></li>
        <li><a href="manage-category.php">Category</a></li>
        <li><a href="manage-food.php">Food</a></li>
        <li><a href="manage-order.php">Orders</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
    </div>

</div>
<!--Main section ends-->