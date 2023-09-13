<?php
include('../config/Contants.php');
$id=$_GET['id'];
$sql="DELETE FROM tbl_admin WHERE id=$id";
$res=mysqli_query($con,$sql);
if($res==TRUE)
{
    // echo "deletd";
    // create session to display message
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
    // Redirecting to same page
    header('location:'.SITEURL.'admin/Manage_admin.php');
}
else
{
    // echo "not";
    
    // create session to display message
    $_SESSION['delete']="<div class='error'> Admin Not Deleted Successfully</div>";
    // Redirecting to same page
    header('location:'.SITEURL.'admin/Manage_admin.php');
}
?>