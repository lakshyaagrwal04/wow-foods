<?php
include('../config/Contants.php');
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    // echo "process to delete";
    // get the image name and id
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    // remove the image is available or not
    if($image_name!="")
    {
        // it has image and need to remove it from folder
        // get the image path
        $path="../images/food/".$image_name;
        // remove image file from folder
        $remove=unlink($path);
        // check the image is removee or not
        if($remove==false)
        {
            // failed to remove image 
            $_SESSION['upload']="<div class='error'>Failed to remove image file</div>";
            // redirect to manage food
            header("location:".SITEURL."admin/Manage_food.php");
            // stop process of deleting food
            die();
        }

    }
    // delete FOOD from database
    $sql="DELETE FROM tbl_food WHERE id=$id";
    // execute the query
    $res=mysqli_query($con,$sql);
    // cheeck the query is executed or not
    if($res==true)
    {
        //food deleted
        $_SESSION['delete']="<div class='success'> Food deletd successfully</div>";
        header("location:".SITEURL."admin/Manage_food.php");
    }
    else
     {
        # failed to delete food
        
        $_SESSION['delete']="<div class='error'>Failed to delete food</div>";
        header("location:".SITEURL."admin/Manage_food.php");
    }
}
else
{
    // echo "redirect";
    $_SESSION['Unauthorized']="<div class='error'>Unauthorized Access</div>";
    header("location:".SITEURL."admin/Manage_food.php");
}
?>