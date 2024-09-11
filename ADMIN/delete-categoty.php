<?php include('partials/menu.php');?>

<?php 
    //check whether the id and the image name value are set or not
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        //get value and delete
        //echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //1. remove the physical image if available then delete data from database and redirect to manage-category page with mesage
        if($image_name !=""){
            //Image available then remove it
            $path = "images/category_images/".$image_name;
            //remove the image function
            $remove = unlink($path);
            //check if image removed successfully
            if($remove == false){
                //failed to remove image and stop the process
                //set the session message
                $_SESSION['remove'] = "<div class='failed'>Failed to remove the category image.</div>";
                //redirect
                header('location:'.SITEURL.'ADMIN/manage-category.php');
                //stop the process
                die();
            }
        }
        //delete the data from the database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        //execute the query
        $result = mysqli_query($conn,$sql);
        //CHECK WHETHER DATA IS DELETED OR NOT
        if($result == true){
            //set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category deleted successfully</div>";
              //redirect to the manage category paeg
                header('location:'.SITEURL.'ADMIN/manage-category.php');
        }
    }else{
        //set success message and redirect
        $_SESSION['delete'] = "<div class='success'>Failed to delete category</div>";
        //redirect to the manage category paeg
          header('location:'.SITEURL.'ADMIN/manage-category.php');
    }

?>

<?php include('partials/footer.php');?>