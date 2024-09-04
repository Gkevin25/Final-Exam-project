<?php include('config/constants.php')?>
<?php 
//1. destroy the session
session_destroy(); // uns
//redirect to login page
header('location:'.SITEURL.'ADMIN/login.php');
?>