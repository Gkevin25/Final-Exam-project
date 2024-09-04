<?php 
// Autherization or Access control
// check whether user login in or not

if(!isset($_SESSION['user'])){// if user session not set
    //user redirected to login
    $_SESSION['not-login'] = "<div class='failed text-center'>USER NOT LOGGED IN.</div>";
    header('location:'.SITEURL.'ADMIN/login.php');
}
?>
