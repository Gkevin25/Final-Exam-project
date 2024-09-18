<?php include('partials/menu.php');?>
<!--Main content section starts-->
<div class="main-content">

<div class="wrapper">
    <h1>MANAGE ORDERS</h1>
    <br>
    <?php 
    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    ?>
</div>
<div class="clearfix"></div>

    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>

            <?php 
            //get all the orders from db
            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
            //execute the query
            $result = mysqli_query($conn,$sql);
            //count the rows
            $sn = 1;
            $count = mysqli_num_rows($result);
            if($count > 0){
                //order available
                while($row = mysqli_fetch_assoc($result)){
                    //getting all the orders 1 by 1
                    $id = $row['id'];
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact  = $row['customer_contact'];
                    $customer_email  = $row['customer_email'];
                    $customer_address = $row['customer_address'];

                    ?>
                             <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $food;?></td>
                                <td><?php echo $price;?></td>
                                <td><?php echo $qty;?></td>
                                <td><?php echo $total;?></td>
                                <td><?php echo $order_date;?></td>

                                <td>
                                    <?php 
                                    if($status=="Ordered"){
                                        echo "<label>$status</label>";
                                    }elseif($status=="On delivery"){
                                        echo "<label style='color:orange;'>$status</label>";
                                    }elseif($status=="Delivered"){
                                        echo "<label style='color:green;'>$status</label>";
                                    }elseif($status=="Cancelled"){
                                        echo "<label style='color:red;'>$status</label>";
                                    }
                                    ?>
                                </td>


                                <td><?php echo $customer_name;?></td>
                                <td><?php echo $customer_contact;?></td>
                                <td><?php echo $customer_email;?></td>
                                <td><?php echo $customer_address;?></td>
                                <td>
                                    <a class="btn-secondary" href="<?php echo SITEURL?>ADMIN/update-order.php?id=<?php echo $id?>">Update</a> 
                                </td>
                            </tr>
                    <?php
                }
            }else{
                //orders not available
                echo "<tr>
                        <td colspan='12' class='failed'>Orders not available</td>
                      </tr>";
            }
            ?>
    </table>
</div>
<div class="clearfix"></div>
</div>
<!--Main content section starts-->
<?php include('partials/footer.php');?>