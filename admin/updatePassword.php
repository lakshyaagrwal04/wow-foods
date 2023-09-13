<?php include('./partial/header.php'); ?>
<div class="main-section">
    <div class="wraper">
        <h1> Channge Password</h1>
        <br><br>
        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name="current_password" >
                    </td>
                </tr>
                
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="enter new password">
                    </td>
                </tr>
                
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder=" reenter new password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="change Password" class="btn-Secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>   
<?php
    // check btn is clicked or not

    if(isset($_POST['submit']))
    {
        // get data from table
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
        // check the user id or password exits or not
        $sql="SELECT * FROM tbl_admin WHERE id=$id AND PASSWORD='$current_password'";
        // run the query
        $res=mysqli_query($con,$sql);
        if($res==true)
        {
            // check data is available or not
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                // user exists and password can be changed
                // check new password or confirm password are same
                if($new_password==$confirm_password)
                {
                    // echo "password  match";
                    $sql2="UPDATE tbl_admin SET password='$new_password' WHERE id=$id";
                    $res2=mysqli_query($con,$sql2);

                    if($res2==true)
                    {
                        // display success Message
                        
                    $_SESSION['pwd-change']="<div class='success'> password change Successfully</div>";
                    header('location:'.SITEURL.'admin/Manage_admin.php');
                    }
                    else
                    {
                        // display error message
                        
                    $_SESSION['pwd-change']="<div class='error'> password Not change Successfully</div>";
                    header('location:'.SITEURL.'admin/Manage_admin.php');

                    }
                }
                else
                {
                    $_SESSION['pwd-not-match']="<div class='error'> password dont match</div>";
                    header('location:'.SITEURL.'admin/Manage_admin.php');
                }
            }
            else
            {
                // user does not exists and redirect
                $_SESSION['user-not-found']="<div class='error'> User not found </div>";
                // redirect the user
                header('location:'.SITEURL.'admin/Manage_admin.php');
            }
        }
    }
?>
<?php include('./partial/footer.php'); ?>