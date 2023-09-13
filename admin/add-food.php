<?php include('partial/header.php');?>
<div class="main-section">
    <div class="wraper">
        <h1>Add Food</h1>
        <br><br>
        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="title of food"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="20" rows="5" placeholder="Description of food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td> Category:</td>
                    <td>
                        <select name="category" >
                            <?php
                                $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                                $res=mysqli_query($con,$sql);
                                $count=mysqli_num_rows($res);
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id=$row['id'];
                                        $title=$row['title'];
                                        ?>
                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                            <option value="0">No category found</option>

                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="NO">NO
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="NO">NO
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-Secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                // echo "click";
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $category=$_POST['category'];
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
                if(isset($_FILES['image']['name']))
                {
                    // get details of selected image
                    $image_name=$_FILES['image']['name'];
                    // check the image is selected or not and upload image is selectd;
                    if($image_name!="")
                    {
                        // image is selected
                        // A. rename image
                        // Get extension of selected image(jpg ,png,gif etc)

                        $ext=end(explode('.',$image_name));
                        // create new name for Image
                        $image_name="food-name-".rand(0000,9999).".".$ext;
                        // B. upload image
                        //get src path and Destination Path
                        //source path is the current location of iamge
                        $src=$_FILES['image']['tmp_name'];
                        // destination path for the image too be uploaded
                        $dst="../images/food/".$image_name;
                        $upload=move_uploaded_file($src,$dst);
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to upload image";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }

                    }
                }
                else
                {
                    $image_name="";//setting default value as blank
                }
                $sql2="INSERT INTO tbl_food SET 
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                faetured = '$featured',
                active = '$active'
                ";
                $res2=mysqli_query($con,$sql2);
                if($res2 == TRUE)
                {
                    $_SESSION['add']="<div class='success'> Food Data Insertd Successfully</div>";
                    header('location:'.SITEURL.'admin/Manage_food.php');
                }
                else
                {
                    
                    $_SESSION['add']="<div class='error'>Failed to add food</div>";
                    header('location:'.SITEURL.'admin/Manage_food.php');

                }

            }
        ?>
    </div>
</div>
<?php include('partial/footer.php');?>