<?php
include('../config/Contants.php');
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    // echo "get value anddeleted";
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    // remove image
    if($image_name!="")
    {
        $path="../images/category/".$image_name;
        $remove=unlink($path);
        if($remove==false)
        {
             $_SESSION['remove']="<div class='error'>Failed to remove category Image</div>";
             header('location:'.SITEURL.'admin/Manage_category.php');
             die();
        }
    }
    $sql="DELETE FROM tbl_category WHERE id=$id";
    $res=mysqli_query($con,$sql);
    if($res==TRUE)
    {
        $_SESSION['delete']="<div class='success'> Category Deletd Successfully</div>";
        header('location:'.SITEURL.'admin/Manage_category.php');
    }
    else
    {
        
        $_SESSION['delete']="<div class='error'>Failed to Deletd Category</div>";
        header('location:'.SITEURL.'admin/Manage_category.php');
    }
}
else
{
    header('location:'.SITEURL.'admin/Manage_category.php');
}
?>