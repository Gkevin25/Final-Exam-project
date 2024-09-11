<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <?php 
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Enter the name of the food" required></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" id="" cols="30" rows="5" placeholder="description of the food"></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price"></td>
                </tr>
                <tr>
                    <td>Select image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" id="">

                            <?php 
                            //create to display the various categories from the db
                            //1. create sql to et all the active categories and display on the drop down
                            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                            //execute the query
                            $result = mysqli_query($conn,$sql);
                            //count the rows to check if we have active categories or not
                            $count = mysqli_num_rows($result);
                            $sn = 1;
                            if($count > 0){
                                //we have active categories
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                    <?php
                                }
                            }else{
                                //we don't have active categories
                                ?>
                                <option value="0">No category found</option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

            <?php 
            //check if submit button is clicked or not
            if(isset($_POST['submit'])){
                // Add food to the database
                //1.get data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //check whether radio for featured or active are clicked or not
                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }else{
                    $featured = "No";// default settings
                }
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }else{
                    $active = "No";// default settings
                }

                //2.Upload the image if selected
                // chech if button is clicked
                if(isset($_FILES['image']['name'])){
                    //get the details of the selected image
                    $image_name = $_FILES['image']['name'];
                    //check if image selected or not
                    if($image_name !=""){
                        //image selected
                        //Rename the image
                        $ext = end(explode('.',$image_name));
                        //create new name for the image
                        $image_name = "food_name".rand(0000,9999).".".$ext;// new image name generated
                        //Upload the image
                        //1.get the source path and destination path
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "images/food_images/".$image_name;
                        //2. Upload food image
                        $upload = move_uploaded_file($source_path,$destination_path);
                        //check if image uploaded or not
                        if($upload == false){
                            //redirect to add food page and stop the process
                            $_SESSION['upload'] = "<div class='failde'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'ADMIN/add-food.php');
                            die();
                        }
                    }else{
                        //image not selected
                    }
                }else{
                    $image_name = "";//setting default value as blank
                }
                //3.Insert on db
                //create sql to save our data in the database
                $sql2 = "INSERT INTO tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'
                ";
                //execute the query
                $result2 = mysqli_query($conn,$sql2);
                if($result2 == true){
                    //data inserted
                    $_SESSION['food-added'] = "<div class='success'>Food Added successfully</div>";
                    header('location:'.SITEURL.'ADMIN/manage-food.php');
                }else{
                     //data not inserted
                     $_SESSION['food-added'] = "<div class='failed'>Failed to add food</div>";
                     header('location:'.SITEURL.'ADMIN/manage-food.php');
                }
                //4.redirect to manage food page
            }
            ?>

    </div>
</div>
<?php include('partials/footer.php');?>