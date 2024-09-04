<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>CHANGE PASSWORD</h1>
        <br>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id']; 
        }
        ?>
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="change password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
//check if button is clicked
if(isset($_POST['submit'])){
    //clicked
    //1. get data from form

    $id = $_POST['id'];
    $current_password  = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    //2. check whether the user and the password exist
    $sql = "SELECT * FROM admin WHERE id=$id";
    // execute the query
    $result = mysqli_query($conn,$sql);

    if($result==TRUE){
        $count = mysqli_num_rows($result);
        if($count==1){
            // User exist
            //check whether the new password and update password match or not
            if($new_password == $confirm_password){
                $sql_update = "UPDATE admin SET
                password = '$new_password'
                WHERE id = $id
                ";
                //execute the query
                $new_result = mysqli_query($conn,$sql_update);
                // checking execution
                if($new_result == true){
                    // execute
                    $_SESSION['change-psd'] = "<div class='success'>PASSWORD CHANGED SUCCESSFULLY.</div>";
                    header('location:'.SITEURL.'ADMIN/manage-admin.php');
                }else{
                    //not executed
                    $_SESSION['change-psd'] = "FAILED TO CHANGE PASSWORD";
                    header('location:'.SITEURL.'ADMIN/manage-admin.php');
                }

            }else{
                //Redirect to admin page with error message 
                $_SESSION['psd-not-match'] = "ERROR: NEW PASSWORD AND CONFIRM PASSWORD NOT MATCH";
            header('location:'.SITEURL.'ADMIN/manage-admin.php');
            }
        }else{
            //User not found
            $_SESSION['user-not-found'] = "USER NOT FOUND";
            header('location:'.SITEURL.'ADMIN/manage-admin.php');
        }
    }
    //3. check if the new password and confirm password match or not
    //4. change password if all above is true.
}
?>

<?php include('partials/footer.php')?>