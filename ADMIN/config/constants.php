<?php
// Session start
session_start();


// creating constants for non repeating variables
define('SITEURL','http://localhost/tt/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','tasty-treasure');

//3. execute the query and save data in database
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); // database connection
$db = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
?>