<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>
        <?php 
        if(isset($_GET['id'])){
            //get the order details
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_order WHERE id = $id";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1){
                //details available
                $row = mysqli_fetch_assoc($result);
                $food =$row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $customer_name =  $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
            }else{
                //details not found
                header('location:'.SITEURL.'ADMIN/manage-order.php');
            }
        }else{
            header('location:'.SITEURL.'ADMIN/manage-order.php');
        }
        ?>
        <form action="" method="post">
            <table class="table-30">
                <tr>
                    <td>Food Name:</td>
                    <td><b><?php echo $food;?></b></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><b><?php echo $price;?>FCFA</b></td>
                </tr>
                <tr>
                    <td>Qty:</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty;?>">
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="">
                            <option <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On delivery"){echo "selected";}?> value="On delivery">On delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";}?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";}?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Customer Name:
                    </td>
                    <td><input type="text" name="customer_name" value="<?php echo $customer_name;?>"></td>
                </tr>
                <tr>
                    <td>
                        Customer contact:
                    </td>
                    <td><input type="text" name="customer_contact" value="<?php echo $customer_contact;?>"></td>
                </tr>
                <tr>
                    <td>
                        Customer email:
                    </td>
                    <td><input type="text" name="customer_email" value="<?php echo $customer_email;?>"></td>
                </tr>
                <tr>
                    <td>
                        Customer address:
                    </td>
                    <td><textarea name="customer_address"  cols="30" rows="5"><?php echo $customer_address;?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="submit" name="submit" value="update order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
            <?php 
            
            if(isset($_POST['submit'])){
                //get all values from 
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $qty * $price;
                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];
                
                //execue the query
                $sql2 = "UPDATE tbl_order SET
                qty = $qty,
                total = $total,
                status = '$status',
                customer_name = '$customer_name',
                customer_contact='$customer_contact',
                customer_email = '$customer_email',
                customer_address= '$customer_address'
                WHERE id = $id
                ";
                //execution
                $result2 = mysqli_query($conn,$sql2);
                 if($result2==true){

                    $_SESSION['update']= "<div class='success'>Order Updated  Successfully.</div>";
                    header('location:'.SITEURL.'ADMIN/manage-order.php');
                 }else{
                    $_SESSION['update']= "<div class='failed'>Failed to update order.</div>";
                    header('location:'.SITEURL.'ADMIN/manage-order.php');
                 }

                

                //update the values
            }
            
             ?>
    </div>
</div>

<?php include('partials/footer.php')?>