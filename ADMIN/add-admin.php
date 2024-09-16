<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>
            <br>
            <br>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; // display session messag if set
                    unset($_SESSION['add']); // Remove the session message
                }
            ?>
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Full name :</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name" pattern='[A-Za-z\s]{4,100}' required></td>
                </tr>
                <tr>
                    <td>User name :</td>
                    <td><input type="text" name="username" placeholder="Enter user name" pattern='[A-Za-z\s]{4,100}' required></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password" placeholder="Enter your password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php');?>

<?php 
if(isset($_POST['submit'])) 
    {
        // 1. Get the data from the form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // password encryption with md5 algo

        //2. SQL Query to save the data into the data base
        $sql = "INSERT INTO admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
            // 3. Executing the query and saving data into db
            $result = mysqli_query($conn, $sql) or die(mysqli_error());

            //4. Chech whether the data is inserted or not to the db and display message.
            if($result == TRUE){
               // echo "data inserted successfully";
               // create a variable to display message
               $_SESSION['add'] = "<div class='success'>ADMIN CREATED SUCCESSFULLY.</div>";
               // redirect user to this link
               header("location:".SITEURL.'ADMIN/manage-admin.php');
            }else{
                // echo "failed";
                 // create a variable to display message
               $_SESSION['add'] = "<div class='failed'>FAILED TO CREATE ADMIN.</div>";
               // redirect user to this link
               header("location:".SITEURL.'ADMIN/add-admin.php');
            }
    }
?>