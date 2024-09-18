<?php include('partials/menu.php');?>
<!--Main content section starts-->
<div class="main-content">

<div class="wrapper">
    <h1>MANAGE FOOD</h1>
    <br>
    <?php 
     if(isset($_SESSION['food-added'])){
        echo $_SESSION['food-added'];
        unset($_SESSION['food-added']);
     }
     if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
     }
     if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
     }
     if(isset($_SESSION['unauthorised'])){
        echo $_SESSION['unauthorised'];
        unset($_SESSION['unauthorised']);
     }
     if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
     }
     ?>
     <br>
     <br>
<!--Button to create a new admin-->
<a class="btn-primary" href="<?php echo SITEURL;?>ADMIN/add-food.php">Add Food</a>
     <br><br>
     
<div class="clearfix"></div>

    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php 
        //create sql query to get all the food
        $sql = "SELECT * FROM tbl_food";
        //execute the query
        $result = mysqli_query($conn,$sql);
        //check if we have food or not
        $count = mysqli_num_rows($result);
        $sn = 1;
        if($count > 0){
            //we have food in database
            //getting and displaying the food
            while($row = mysqli_fetch_assoc($result)){
                //getting individual values
                $id = $row['id'];
                $title = $row['title'];
                $price  = $row['price'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
                ?>
                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $title;?></td>
                            <td><?php echo $price;?>FCFA</td>
                            <td>
                                <?php 
                                // check if we have image or not
                                if($image_name == ""){
                                    //we don't have image
                                    echo "<div class='failed'>Image not Added.</div>";
                                }else{
                                    //we have image
                                    ?>
                                    <img src="<?php echo SITEURL;?>ADMIN/images/food_images/<?php echo $image_name;?>" alt="food image here" width="50px">
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $featured;?></td>
                            <td><?php echo $active;?></td>
                            <td>
                              <a class="btn-secondary" href="<?php echo SITEURL;?>ADMIN/update-food.php?id=<?php echo $id;?>">Update food</a> 
                               <a class="btn-danger" href="<?php echo SITEURL;?>ADMIN/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>">Delete food</a>
                            </td>
                        </tr>
                <?php
            }
        }else{
            // food not added in database
            echo "<tr>
                    <td colspan='7' class='failed'>Food not added into database.</td>
                    </tr>";
        }
        ?>
        
        
    </table>
</div>
<div class="clearfix"></div>
</div>
<!--Main content section starts-->
<?php include('partials/footer.php');?>