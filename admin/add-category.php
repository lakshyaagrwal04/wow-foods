<?php include('partial/header.php');?>
<div class="main-section">
    <div class="wraper">
        <h1> Add Category</h1>
        <br><br>
        <?php
            if(isset($_SESSION['adding']))
            {
                echo $_SESSION['adding'];
                unset($_SESSION['adding']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            
        ?>
        <br>
        <!-- category form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" id="" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" id="" value="yes">Yes
                        <input type="radio" name="featured" id="" value="NO">NO
                    </td>
                </tr>
                
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes">Yes
                        <input type="radio" name="active" id="" value="NO">NO
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-Secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit']))
            {

                 $title=$_POST['title'];
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else
                {
                    $featured="No";
                }
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active="No";
                }
                // print_r($_FILES['image']);
                // die();
                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];
                    if($image_name!="")
                    {
                    // change the image name
                    $ext=end(explode('.',$image_name));
                    // rename the image
                    $image_name="Food_category_".rand(000,999).'.'.$ext;

                    $source_path=$_FILES['image']['tmp_name'];
                    $destination_path="../images/category/".$image_name;
                    $upload=move_uploaded_file($source_path,$destination_path);
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }
                }
                }
                else{
                    $image_name="";
                }
                $sql="INSERT INTO tbl_category SET 
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";
                 $res=mysqli_query($con,$sql);
                if($res==true)
                {
                    $_SESSION['adding']="<div class='success'> Category Added Successfully</div>";
                    header('location:'.SITEURL.'admin/Manage_category.php');
                }
                else
                {
                    
                    $_SESSION['adding']="<div class='error'> Failed to Add Category</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>
    </div>
</div>
<?php include('partial/footer.php');?>