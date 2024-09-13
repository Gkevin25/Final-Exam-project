<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE CATEGORY</h1>
    <br>
    <br>
     <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['no-category-found'])){
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }
        if(isset($_SESSION['update-cat'])){
            echo $_SESSION['update-cat'];
            unset($_SESSION['update-cat']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['failed-remove'])){
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }
        ?>
        <br><br>
<!--Button to create a new admin-->
<a class="btn-primary" href="<?php echo SITEURL;?>ADMIN/add-category.php">Add Category</a>
     <br>
     <br>
<div class="clearfix"></div>

    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
        <?php 
        $sql = "SELECT * FROM tbl_category";
        //execute the query
        $result = mysqli_query($conn,$sql);
        //count the rows
        $count = mysqli_num_rows($result);
        //create serial num variable
        $sn = 1;
        // check if data is in db
        if($count > 0){
            // data found and display the db table content
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
                ?>

                <tr>
                    <td><?php echo $sn++;?> </td>
                    <td><?php echo $title;?></td>
                    <td>
                        <?php
                        //check whether image name is available or not
                        if($image_name != ""){
                            //display image
                            ?>
                            <img src="<?php echo SITEURL;?>ADMIN/images/category_images/<?php echo $image_name?>" alt="Food category image here" width="50px" >
                            <?php
                        }else{
                            // Displat the message
                            echo "<div class='failed'>Image not Added</div>";
                        }
                        
                        ?>
                    </td>


                    <td><?php echo $featured;?></td>
                    <td><?php echo $active;?></td>
            <td>
                <a class="btn-secondary" href="<?php echo SITEURL?>ADMIN/update-category.php?id=<?php echo $id;?>">Update Category</a> 
                <a class="btn-danger" href="<?php echo SITEURL;?>ADMIN/delete-categoty.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>">Delete Category</a>
            </td>
        </tr>

                <?php
            }
        }else{
            // the db is empty
            ?>
            <tr>
            <td colspan="6">
            <div>No category added</div>
            </td>
            </tr>
            <?php
        }
        ?>
       
    </table>
        
    </div>
    
</div>
<?php include('partials/footer.php');?>