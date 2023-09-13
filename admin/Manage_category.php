<?php include('partial/header.php'); ?>
    <!-- Main Section Start -->
    <div class="main-section">
        <div class="wraper">
            <h1>category</h1>
            <br><br>
            <?php
            if(isset($_SESSION['adding']))
            {
                echo $_SESSION['adding'];
                unset($_SESSION['adding']);
            }
            if(isset($_SESSION['remove']))
            {
                echo  $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }
            if(isset( $_SESSION['update']))
            {
                echo  $_SESSION['update'];
                unset( $_SESSION['update']);
            }
            if(isset( $_SESSION['upload']))
            {
                echo  $_SESSION['upload'];
                unset( $_SESSION['upload']);
            }
            if(isset( $_SESSION['failed-remove']))
            {
                echo  $_SESSION['failed-remove'];
                unset( $_SESSION['failed-remove']);
            }
            
        ?>
        <br><br>
            <!-- button for add admin -->
            <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primmary"> Add Category</a>

            <br><br>
        <table class="mytbl">
            <tr>
                <th>S.No.</th>
                <th>Title</th>
                <th>image</th>
                <th>Featured</th>
                <th>active</th>
                <th>Action</th>
            </tr>
            <?php
            $sql="SELECT * FROM tbl_category";
            $res=mysqli_query($con,$sql);
            $sn=1;
            $count=mysqli_num_rows($res);
            if($count>0)
            {

                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                    ?>
                        <tr>
                <td><?php echo $sn++;?></td>
                <td><?php  echo $title;?></td>
                <td>
                    <?php
                        if($image_name!="")
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px" alt="">
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'> Image not uploaded</div>";
                        }
                    ?>
                </td>
                <td>
                    <?php echo $featured;?>
                </td>
                <td> <?php echo $active;?></td>
                <td>
                    
                <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>" class="btn-Secondary"> Update Category</a>
                <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger"> Delete Category</a>
                </td>
            </tr>
                <?php
                }
            }
            else
            {
                ?>
                <tr>
                <td colspan="6"><div class="error"> No category Added</div></td>
            </tr>
                <?php
            }
            ?>
            
            
        </table>
        
    </div>    
</div>
    <!-- Main Section end -->
<?php include('Partial/footer.php'); ?>