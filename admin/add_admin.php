<?php include('partial/header.php'); ?>
<div class="main-section">
    <div class="wraper">
        <h1>Admin</h1>
        <br><br>
        
        <?php
                if(isset($_SESSION['add'])) //checking the session is set or not
                {
                    // display session message
                    echo $_SESSION['add'];
                    // remove  session message
                    unset($_SESSION['add']); 
                }
            ?>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="enter your name"></td>
                </tr>
                <tr>
                    <td>Usernamme</td>
                    <td><input type="text" name="User_name" placeholder="enter your username"></td>
                </tr>                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="enter your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-Secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partial/footer.php'); ?>
<!-- fetch form data -->
<?php
if(isset($_POST['submit']))
{
    $fullname=$_POST['full_name'];
     $Username=$_POST['User_name'];
    $password=md5($_POST['password']);
    // insert data from query

    $sql="INSERT INTO tbl_admin SET 
        fullname='$fullname',
        username='$Username',
        password='$password'";
        // excute query and connect the database

        $res=mysqli_query($con,$sql) or die(mysqli_error());
        
        // check the data is inserted into database

        if($res==true)
        {
            // data inserted
            // create a session variable to dispalying message
            $_SESSION['add']="Admin Added Successfully";
            // redirecting page
            header("location:".SITEURL.'admin/Manage_admin.php');
        }
        else
        {
            // data not inserted
            
            // create a session variable to dispalying message
            $_SESSION['add']='Failed to add admin';
            // redirecting page
            header("location:".SITEURL.'admin/add_admin.php');
        }
}
?>