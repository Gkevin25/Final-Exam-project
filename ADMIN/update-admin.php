<?php include('partials/menu.php')?>

<div class="main-content">
    <div  class="wrapper">
        <h1>Update Admin</h1>
        <br>
        <?php
        // getting the id passed through the form
        $id = $_GET['id'];
        // Creating query to get the admin based on the id
        $sql = "SELECT * FROM admin WHERE id= $id";
        // executing the query
        $result  = mysqli_query($conn,$sql);

        if($result == true){
            // checking if there is data in the db
            $count = mysqli_num_rows($result);
            if($count == 1){
                // get the detaials
                //echo "admin available";
                $row = mysqli_fetch_assoc($result);

                $full_name = $row['full_name'];
                $username = $row['username'];
            }else{
                //redirect to admin page
                header('location:'.SITEURL.'ADMIN/manage-admin.php');
            }
        }
        ?>
        <form action="" method="POST">
        <table class="table-30">
            <tr>
                <td>FULL NAME:</td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name?>">
                </td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" value="<?php echo $username?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
<?php
//check whether the submit button is clicked
if(isset($_POST['submit'])){
    //echo "button clicked";
    // getting all the data from the form
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //Creating the sql query to update the admin data in the data base
    $sql = "UPDATE admin SET
    full_name = '$full_name',
    username = '$username' 
    WHERE id = '$id'
    ";

    //executing the sql query
    $result = mysqli_query($conn,$sql);

    // checking if query is executed or not
    if($result == true){
        // Executed successfully
        $_SESSION['update'] = "<div class='success'>ADMIN UPDATED SUCCESSFULLY</div>";
        header('location:'.SITEURL.'ADMIN/manage-admin.php');
    }else{
        // Failed
        $_SESSION['update'] = "<div class='failed'>FAILED TO UPDATE ADMIN.</div>";
        header('location:'.SITEURL.'ADMIN/manage-admin.php');
    }
}
?>
<?php include('partials/footer.php')?>