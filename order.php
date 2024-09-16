<?php include('ADMIN/config/constants.php')?>
<?php 
// check whether food id is set
if(isset($_GET['food_id'])){
    //get the food id and detailes of the selected food
    $food_id = $_GET['food_id'];
    //get the details of the selected food
    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
    //execute the query
    $result = mysqli_query($conn,$sql);
    //count the rows
    $count = mysqli_num_rows($result);
    if($count == 1){
        //we have data
        $row = mysqli_fetch_assoc($result);
        
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    }else{
        //food not available
        //redirect to home page
        header('location:'.SITEURL);
    }
}else{
    //redirect to home page
    header('location:'.SITEURL);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Treasure</title>

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
                    <a href="<?php echo SITEURL;?>menu.php">Menu</a>
                    <a href="<?php echo SITEURL;?>about.php">About</a>
                    <a class="active" href="<?php echo SITEURL;?>order.php" class="cta-button">Order Now</a>
                </div>
            </div>
        </header>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search-order">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        //check if image is available
                        if($image_name==""){
                            //image not available
                            echo "<div class='failed'>Image not found.</div>";
                        }else{
                            //image available
                            ?>
                            <img src="<?php echo SITEURL?>ADMIN/images/food_images/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        <p class="food-price"><?php echo $price;?>FCFA</p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. suh junior" class="input-responsive" pattern="[A-Za-z\s]{4,100}" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. (+237) 6XX-XX-XX-XX" class="input-responsive" pattern="\d*" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@ictuniversity.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="Street, City,(E.g emana, Yaounde)" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 
            if(isset($_POST['submit'])){
                //get all the details from form
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;//evaluating the total

                    $order_date = date("Y-m-d h:i:sa");//return current data and time
                    $status = "ordered"; //ordered,On delivery,Delivered,cancelled
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //save the order in db
                    //create sql
                    $sql2 = "INSERT INTO tbl_order SET
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //execute query
                    $result2 = mysqli_query($conn,$sql2);
                    if($result2==true){
                        //query executed and order saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div><br><div class='success text-center'>You shall receive a confirmation call shortly.</div>";
                        header('location:'.SITEURL.'menu.php');
                    }else{
                        // failed to execute query
                        $_SESSION['order'] = "<div class='failed text-center'>Failed to Order food.</div>";
                        header('location:'.SITEURL.'menu.php');
                    }
            }else{

            }
            ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved.<a href="#"></a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>