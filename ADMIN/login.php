<?php 
include('config/constants.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Admin_css/admin_style.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <br>
        <?php 
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['not-login'])){
            echo $_SESSION['not-login'];
            unset($_SESSION['not-login']);
        }
        ?>
        <!--login form starts here-->
        <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter username"><br>
            <br>
            Password:<br>
            <input type="password" name="password" placeholder="Enter password" autocomplete="off"><br>
            <br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br>
            <br>
        </form>
        <!--login form ends here-->
    </div>
</body>
</html>
<?php 
//check if submit button is clicked
if(isset($_POST['submit'])){
    //process the login
    //1. Get the data from the form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2.check whether the data above exist in the db or not
    $sql = "SELECT * FROM admin WHERE username='$username'AND password='$password'";

    //3. execute the query
    $result = mysqli_query($conn,$sql);

    //4. Count rows to check whether user exist or not
    $count = mysqli_num_rows($result);

    if($count == 1){
        //user available
        $_SESSION['login'] = "<div class='success'>Login Successfull.</div>";
        $_SESSION['user'] = $username; // to check whether user is login or not
        header('location:'.SITEURL.'ADMIN/');
    }else{
        // user not available
        $_SESSION['login'] = "<div class='failed text-center'>Username or password did not match.</div>";
        header('location:'.SITEURL.'ADMIN/login.php');
    }
}
?>