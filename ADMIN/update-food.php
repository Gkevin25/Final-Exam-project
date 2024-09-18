<?php include('partials/menu.php');?>


<?php 
//check whether id is set
if(isset($_GET['id'])){
    //get all the details
    $id = $_GET['id'];
    // sql query to get the selected food
    $sql2 = "SELECT * FROM tbl_food WHERE id = $id";
    //execute the query
    $result2 = mysqli_query($conn,$sql2);
    //get the values based on the query
    $row2 = mysqli_fetch_assoc($result2);
    //get the individual values of the selected food
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
}else{
    //redirect to manage food
    header('location:'.SITEURL.'ADMIN/manage-food.php');
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>
            UPDATE FOOD
        </h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" value="<?php echo $title;?>" placeholder="Food name goes here"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" id="" cols="30" rows="5"><?php echo $description;?></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" value="<?php echo $price;?>"></td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php 
                        if($current_image == ""){
                            //image not available
                            echo "<div class='failed'>Image not available.</div>";
                        }else{
                            //image available
                            ?>
                                <img src="<?php echo SITEURL;?>ADMIN/images/food_images/<?php echo $current_image;?>" alt="" width="150px">
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Select New image:
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>
                        Category:
                    </td>
                    <td>
                        <select name="category" id="">
                            <?php 
                            // query to get active categories
                            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                            // execute the query
                            $result = mysqli_query($conn,$sql);
                            //counting the rows
                            $count = mysqli_num_rows($result);
                            //check whether category available
                            if($count > 0){
                                //Available
                                while($row = mysqli_fetch_assoc($result)){
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                                   // echo "<option value='$category_id'>$category_title</option>";
                                   ?>
                                   <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $category_title?></option>
                                   <?php
                                 }
                            }else{
                                //not available
                                echo "<option value='0'>Category not available.</option>";
                            }
                            ?>
                            <option value="0">Test category</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes" required>Yes
                        <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No" required>No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes" required>Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No" required>No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="submit" name="submit" value="update food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
         if(isset($_POST['submit'])){
            //get all details
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];

            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //upload the image if selected
                // check if  upload button is clicked
                if(isset($_FILES['image']['name'])){
                    //upload button clicked
                    $image_name = $_FILES['image']['name']; //new image name
                    //check file availability
                    if($image_name !=""){
                        //image available and rename
                        $parts = explode('.', $image_name);      // Split the image name into parts using '.'
                        $ext = end($parts);    //get the extension of image
                        $image_name = "food_name".rand(0000,9999).'.'.$ext; //renamed image

                        // get the source and destination path
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "images/food_images/".$image_name;

                        //upload file
                        $upload = move_uploaded_file($source_path,$destination_path);

                        // check if image is uploaded or not
                        if($upload == false){
                            //failed to upload
                            $_SESSION['upload'] = "<div class='failed'>Failed to upload.</div>";
                            header('location:'.SITEURL.'ADMIN/manage-food.php');
                            die();
                        }
                        //remove current image if available
                        if($current_image !=""){
                            //current image available
                            $remove_path = "images/food_images/".$current_image;
                            $remove = unlink($remove_path);

                            //check if image removed
                            if($remove == false){
                                //failed to remove image
                                $_SESSION['remove-failed'] ="<div class='failed'>Failed to remove current image.</div>";
                                header('location'.SITEURL.'ADMIN/manage-food.php');
                                die(); 
                            }
                        }
                    }else{
                        $image_name = $current_image;
                    }
                }else{
                    $image_name = $current_image;
                }

            //remove the image if new image uploaded and current image exist
            //update the food in database
            $sql3 ="UPDATE tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
            WHERE id = $id
            ";
            //execute the query
            $result3 = mysqli_query($conn,$sql3);
            //check if the query is executed
            if($result3 == true){
                //executed
                $_SESSION['update'] = "<div class='success'>Food updated successfully.</div>";
                header('location:'.SITEURL.'ADMIN/manage-food.php');
            }else{
                //failed to update food
                $_SESSION['update'] = "<div class='failed'>Failed to update food.</div>";
                header('location:'.SITEURL.'ADMIN/manage-food.php');
            }
            //redirect to manage food with session message
         }
        ?>
    </div>
</div>
<?php include('partials/footer.php');?>