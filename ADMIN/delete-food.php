<?php include('config/constants.php')?>
<?php 
if(isset($_GET['id']) && isset($_GET['image_name'])){
    //process to delete
    //1. Get ID and image
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //2.Remove image if available
    if($image_name !="" ){
        //it has image
        $path = "images/food_images/".$image_name;
        //remove image from folder
        $remove = unlink($path);
        //check if image is remove
        if($remove == false){
            //failed to remove image
            $_SESSION['upload'] = "<div class='failed'>Failed to remove image file.</div>";
            header('location:'.SITEURL.'ADMIN/manage-food.php');
            //stop the process
            die();
        }
    }
    //3. delete food from db
    $sql = "DELETE FROM tbl_food WHERE id = $id";

    $result = mysqli_query($conn,$sql);
    if($result == true){
        //food deleted successfully
        $_SESSION['unauthorised'] = "<div class='success'>Food deleted successfully</div>";
        header('location:'.SITEURL.'ADMIN/manage-food.php');
    }else{
        //failed to delete food
        $_SESSION['unauthorised'] = "<div class='failed'>Failed to delete food</div>";
        header('location:'.SITEURL.'ADMIN/manage-food.php');
    }
    //4. redirectwith message
}else{
    //rediredt to the manage foo page
    $_SESSION['delete'] = "<div class='failed'>Unauthorised access.</div>";
    header('location:'.SITEURL.'ADMIN/manage-food.php');
}
?>