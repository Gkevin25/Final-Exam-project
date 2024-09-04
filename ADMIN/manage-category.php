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
            <th>Full name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>1. </td>
            <td>SUH JUNIOR</td>
            <td>SJ</td>
            <td>
                <a class="btn-secondary" href="">Update Admin</a> 
                <a class="btn-danger" href="">Delete Admin</a>
            </td>
        </tr>
        <tr>
            <td>2. </td>
            <td>SUH JUNIOR</td>
            <td>SJ</td>
            <td>
            <a class="btn-secondary" href="">Update Admin</a> 
            <a class="btn-danger" href="">Delete Admin</a>
            </td>
        </tr>
        <tr>
            <td>3. </td>
            <td>SUH JUNIOR</td>
            <td>SJ</td>
            <td>
            <a class="btn-secondary" href="">Update Admin</a> 
            <a class="btn-danger" href="">Delete Admin</a>
            </td>
        </tr>
    </table>
        
    </div>
    
</div>
<?php include('partials/footer.php');?>