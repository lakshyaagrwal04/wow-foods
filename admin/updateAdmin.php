<?php include('./partial/header.php');?>
<div class="main-section">
    <div class="wraper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        // get the ID of selected admin
        $id=$_GET['id'];
        // create sql query to get details
        $sql="SELECT * FROM tbl_admin WHERE id=$id";
        // run the Query
        $res=mysqli_query($con,$sql);
        // check query is exceuted or not
        if($res==TRUE)
        {
            // checking the data is available or not
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                // get detaile
                // echo "admin available";
                $row=mysqli_fetch_assoc($res);
                $fullname=$row['fullname'];
                $username=$row['username'];
            }
            else
            {
                // redirect to manage Admin page
                header("location:".SITEURL."admin/Manage_admin.php");
            }
                        

        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?php echo $fullname;?>"></td>
                </tr>
                <tr>
                    <td>Usernamme</td>
                    <td><input type="text" name="User_name" value="<?php echo $username;?>"></td>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name='id' value='<?php echo $id;?>'>
                        <input type="submit" name="submit" value="Add Admin" class="btn-Secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit']))
    {
        // echo "button clicked";
        $id=$_POST['id'];
         $fullname=$_POST['full_name'];
       $username=$_POST['User_name'];
    //    create a new sql query to uodate admin
    $sql="UPDATE tbl_admin SET
        fullname='$fullname',
        username='$username'
        WHERE id='$id'";
    $res=mysqli_query($con,$sql);
    // check query is set or not

    if($res==TRUE)
    {
        // QUERY EXECUTED 0R NOT
        $_SESSION['update']="<div class='success'>Admin Updated Successfully</div>";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/Manage_admin.php');
    }
    else{
        
        // QUERY EXECUTED 0R NOT
        $_SESSION['update']="<div class='error'>Admin  NOt Updated Successfully</div>";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/Manage_admin.php');
    }
}

?>
<?php include('./partial/footer.php');?>