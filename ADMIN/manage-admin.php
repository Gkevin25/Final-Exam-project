<?php include('partials/menu.php');?>

<!--Main content section starts-->
<div class="main-content">

<div class="wrapper">
    <h1>MANAGE ADMIN</h1>
    <br>
<?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add']; // displays the session message
        unset($_SESSION['add']); // Remove the session message

    }
    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset ($_SESSION['delete']);
    }
    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['user-not-found'])){
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
    }
    if(isset($_SESSION['psd-not-match'])){
        echo $_SESSION['psd-not-match'];
        unset($_SESSION['psd-not-match']);
    }
    if(isset($_SESSION['change-psd'])){
        echo $_SESSION['change-psd'];
        unset($_SESSION['change-psd']);
    }
    ?>
<br>
<br>
<!--Button to create a new admin-->
<a class="btn-primary" href="add-admin.php">Add Admin</a>
     <br>
     <br>
<div class="clearfix"></div>

    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Full name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <!-- Retrieving the various admin data from the db starts -->
         <?php
            $sql = "SELECT * FROM admin";
            $result = mysqli_query($conn, $sql);

            // check whether the query is executed
            if($result == TRUE){
                // count the number of rows to check if we have data in the db
                $count = mysqli_num_rows($result);// function to get all the rows

                $sn = 1; // variable to create id in good order
                //check the number of rows
                if($count>0){
                    // Meaning we have data in the database
                    // fetches each row in the database and store in array
                    while($rows=mysqli_fetch_assoc($result)){
                        // Using the while to get all the data in the database and these loop will run as there is a row of data in the database.
                        //Get individual row of data
                        $id = $rows['ID'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];

                        // Display value in table
                        ?>


            <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $full_name; ?></td>
            <td><?php echo $username?></td>
            <td>
                <a class="btn-primary" href="<?php echo SITEURL;?>ADMIN/update-password.php?id=<?php echo $id;?>">Change Password</a> 
                <a class="btn-secondary" href="<?php echo SITEURL;?>ADMIN/update-admin.php?id=<?php echo $id;?>">Update Admin</a> 
                <a class="btn-danger" href="<?php echo SITEURL;?>ADMIN/delete-admin.php?id=<?php echo $id;?>">Delete Admin</a>
            </td>
            </tr>
                        <?php

                    } 
                }else{
                    // We don't have data in the database
                }
            }
         ?>
         <!-- Retrieving the various admin data from the db ends -->


    </table>
<div class="clearfix"></div>
    </div>
</div>
<!--Main content section ends-->
<?php include('partials/footer.php');?>