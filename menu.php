<?php include('ADMIN/config/constants.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/menu_style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <header>
            <div class="nav">
                <div class="logo">
                    <a href="<?php echo SITEURL;?>"><img src="images/i.png" alt="Tasty Treasure Logo" width="70" height="70"></a>
                    <h2 class="logo">Tasty Treasure</h2>
                </div>
                <div class="header-right"> 
                    <a    href="<?php echo SITEURL;?>">Home</a>
                    <a class="active" href="<?php echo SITEURL;?>menu.php">Menu</a>
                    <a href="<?php echo SITEURL;?>about.php">About</a>
                    <a href="<?php echo SITEURL;?>order.php" class="cta-button">Order Now</a>
                </div>
            </div>
        </header>
    <!-- Navbar Section Ends Here -->
<br><br><br>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <?php 
            if(isset($_SESSION['order'])){
                echo $_SESSION['order'];
                unset($_SESSION['order']);
            }
            ?>
            <h2 class="text-center">Food Menu</h2>


            <?php 
            //getting food from database that are active and featured
            $sql = "SELECT * FROM tbl_food WHERE active = 'Yes'";
            //execute the query
            $result = mysqli_query($conn,$sql);
            //count rows
            $count = mysqli_num_rows($result);
            //check if food available
            if($count > 0){
                //food available
                while($row = mysqli_fetch_assoc($result)){
                    //get all values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">

                                <?php 
                                //check if image is available
                                if($image_name ==""){
                                    //image not available
                                    echo "<div class='failed'>Image not Available.</div>";
                                }else{
                                    //image available
                                    ?>
                                        <img src="<?php echo SITEURL;?>ADMIN/images/food_images/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>

                                
                            </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price"><?php echo $price;?>FCFA</p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                        </div>
                         </div>

                    <?php

                }
            }else{
                //food not available
                echo "<div class='failed'>Food not available.</div>";
            }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->

    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
           
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>