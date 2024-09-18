<?php include('partials/menu.php');?>
<!--Main content section starts-->
<div class="main-content">

<div class="wrapper">
    <h1>DASHBOARD</h1>
    <br>
    <?php 
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>
    <br>
<div class="clearfix"></div>
    <div class="col-4 text-center">
        <?php 
            $sql = "SELECT * FROM tbl_category";
            $result = mysqli_query($conn,$sql);
            //count rows
            $count = mysqli_num_rows($result);
        ?>
        <h1><?php echo $count;?></h1>
        <br>
        <b>categories</b>
    </div>
    <div class="col-4 text-center">
    <?php 
            $sql2 = "SELECT * FROM tbl_food";
            $result2 = mysqli_query($conn,$sql2);
            //count rows
            $count2 = mysqli_num_rows($result2);
        ?>
        <h1><?php echo $count2;?></h1>
        <br>
        <b>Foods</b>
    </div>
    <div class="col-4 text-center">
    <?php 
            $sql3 = "SELECT * FROM tbl_order";
            $result3 = mysqli_query($conn,$sql3);
            //count rows
            $count3 = mysqli_num_rows($result3);
        ?>
        <h1><?php echo $count3;?></h1>
        <br>
        <b>Total Orders</b>
    </div>
    <div class="col-4 text-center">
        <?php 
        //aggregate function to get total revenue
        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
        $result4 = mysqli_query($conn,$sql4);
        //get value
        $row4 = mysqli_fetch_assoc($result4);
        //get total revenue
        $total_revenue = $row4['Total'];
        ?>
        <h1><?php echo $total_revenue;?>FCFA</h1>
        <br>
        <b>Revenue generated</b>
    </div>
    <div class="clearfix"></div>
    </div>
</div>
<!--Main content section ends-->
<?php include('partials/footer.php');?>