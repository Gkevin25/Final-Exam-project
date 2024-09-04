<?php include('partials/menu.php');?>
<?php
// creating the sql query to delete an admin based on the admin ID
 $id = $_GET["id"];
 $sql = "DELETE FROM admin WHERE id=$id";
// Executing the sql query
 $result = mysqli_query($conn,$sql);

 // Creating session variable to display variables
 if($result == TRUE){
    $_SESSION['delete'] = "<div class='success'>ADMIN DELETED SUCCESSFULLY.</div>";
    header('location:'.SITEURL.'ADMIN/manage-admin.php');
 }else{
    $_SESSION['delete'] = "<div class='failed'>FAILED TO DELETE ADMIN. TRY AGAIN LATER.</div>";
    header('location:'.SITEURL.'ADMIN/manage-admin.php');
 }
?>

<?php include('partials/footer.php');?>