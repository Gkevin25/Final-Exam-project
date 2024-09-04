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
        ?>
        <br><br>
        <!--ADD CATEGORY START-->
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category title">
                    </td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>active:</td>
                    <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
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

        // 2. Create SQL query to insert data into the database
        $sql = "INSERT INTO tbl_category SET
            title = '$title',
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