<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>
            Add Category
        </h1>
        <br><br>
        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br><br>
        <!--ADD CATEGORY START-->
        <form action="" method="POST" enctype="multipart/form-data"> 
            <table class="table-30">
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category title" pattern='[A-Za-z\s]{4,100}' required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Select image:
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" required>Yes
                        <input type="radio" name="featured" value="No" required>No
                    </td>
                </tr>
                <tr>
                    <td>active:</td>
                    <td>
                    <input type="radio" name="active" value="Yes" required>Yes
                    <input type="radio" name="active" value="No" required>No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        <!--ADD CATEGORY ENDS-->
        
    </div>
</div>
<?php 
    // Check if the submit button is clicked or not
    if(isset($_POST['submit'])){
        // 1. Get the values from the form
        $title = $_POST['title'];
        
        // For radio input type, we need to check whether the button is selected or not
        if(isset($_POST['featured'])){
            // Get the value from the form
            $featured = $_POST['featured'];
        } else {
            // Default value returned
            $featured = "No";
        }
        
        if(isset($_POST['active'])){
            // Get the value from the form
            $active = $_POST['active'];
        } else {
            // Default value returned
            $active = "No";
        }

        //Here check whether image selected or not and set image name accordingly
        if(isset($_FILES['image']['name'])){
            //upload the image
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
                header('location:'.SITEURL.'ADMIN/add-category.php');
                die();
            }
        }else{
            //don't upload image and set image value as blank
            $image_name = "";
        }

        // 2. Create SQL query to insert data into the database
        $sql = "INSERT INTO tbl_category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
        ";
        
        // 3. Execute the query and save in the database
        $result = mysqli_query($conn, $sql);

        // 4. Check whether the query executed or not
        if($result == true){
            // Query executed successfully
            $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
            header('location:'.SITEURL.'ADMIN/manage-category.php');
        } else {
            // Failed to add category
            $_SESSION['add'] = "<div class='error'>Failed to add Category.</div>";
            header('location:'.SITEURL.'ADMIN/add-category.php');
        }
    }
?>

<?php include('partials/footer.php')?>