<?php include('partials/menu.php')?>
    <div class="main-content">
        <div class="wrapper">
            <h1>UPDATE CATEGORY</h1>
        <br><br>
        <?php 
        //check whether the id is set or not
        if(isset($_GET['id'])){
            //get the id and other details
            //echo "getting the data";
            $id = $_GET['id'];
            //create sql to all other details
            $sql = "SELECT * FROM tbl_category WHERE id = $id";
            //execute the query
            $result = mysqli_query($conn,$sql);
            //count the rows to check if id is valid or not
            $count = mysqli_num_rows($result);
            if($count == 1){
                $row = mysqli_fetch_assoc($result);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }else{
                //redirect to manage category
                $_SESSION['no-category-found'] = "<div class='failed'>Category not found.</div>";
                header('location:'.SITEURL.'ADMIN/manage-category.php');
            }
        }else{
            //redirect to manage category
            header('location:'.SITEURL.'ADMIN/manage-category.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="table-30">
            <tr>
                <td>
                    Title:
                </td>
                <td><input type="text" name="title" value="<?php echo $title?>"></td>
            </tr>
            <tr>
                <td>Current image:</td>
                <td>
                    <?php 
                    if($current_image !=""){
                        //display image
                        ?>
                        <img src="<?php echo SITEURL;?>ADMIN/images/category_images/<?php echo $current_image;?>" alt="" width="50px">
                        <?php
                    }else{
                        //display the message
                        echo "<div class='failed'>Image not added.</div>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Select the new image:</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Featured</td>
                <td>
                    <input <?php if($featured == "Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes

                    <input <?php if($featured == "No"){echo "checked";}?> type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active</td>
                <td>
                    <input <?php if($active == "Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes

                    <input <?php if($active == "No"){echo "checked";}?> type="radio" name="active" value="No">No
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="update_category" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
        <?php 
        if(isset($_POST['submit'])){
           //1. get all the values from the form
           $id = $_POST['id'];
           $title = $_POST['title'];
           $current_image = $_POST['current_image'];
           $featured = $_POST['featured'];
           $active = $_POST['active'];

           //2. updating new image if selected
            //check whether image is selected or not
            if(isset($_FILES['image']['name'])){
                //get image details
                $image_name = $_FILES['image']['name'];
                //check if image is available
                if($image_name !=""){
                    //image available
                    //upload the new image

                     //1. upload the image
                     // To upload image we need image name,source path and destination path
                    $image_name = $_FILES['image']['name'];
                    // Auto rename image before upload
                    //1. get the extension of the image
                    $ext = end(explode('.',$image_name));
                    //Renaming the image
                    $image_name = "food_category_".rand(000,999).'.'.$ext;

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "images/category_images/".$image_name;

                    //finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check if image was uploaded successfully or not and redirect with appropriate msg
                    if($upload == false){
                      // set message
                     $_SESSION['upload'] = "<div class='failed'>Failed to upload image.</div>";
                     header('location:'.SITEURL.'ADMIN/manage-category.php');
                    die();
                     }
                     if($current_image !=""){
                        $remove_path = "images/category_images/".$current_image; 

                        $remove = unlink($remove_path);
    
                        //check whether the image is removed or not and if failed to remove stop and display message
                        if($remove == false){
                            //failed to remove image
                            $_SESSION['failed-remove'] = "<div class='failed'>Failed to remove current image.</div>";
                            header('location:'.SITEURL.'ADMIN/manage-category.php');
                            die();
                        }
                     }
                    //remove the current image
                  
                }else{
                    $image_name = $current_image;
                }

            }else{
                $image_name = $current_image;
            }

            //3. update the database
           $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
           ";
           //execute the query
           $result2 = mysqli_query($conn,$sql2);
          
           //4. redirect to manage category
           //check if query executed
           if($result2 == true){
            //category updated
            $_SESSION['update-cat'] = "<div class='success'>Category updated successfully.</div>";
            header('location:'.SITEURL.'ADMIN/manage-category.php');
           }else{
            //failed to update
            $_SESSION['update-cat'] = "<div class='success'>Failed to update category.</div>";
            header('location:'.SITEURL.'ADMIN/manage-category.php');
           }
        }
        ?>
    </div>
    </div>

<?php include('partials/footer.php')?>