<?php include('partial/header.php'); ?>
    <!-- Main Section Start -->
    <div class="main-section">
        <div class="wraper">
            <h1>Food</h1>
            <br><br>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['Unauthorized']))
            {
                echo $_SESSION['Unauthorized'];
                unset($_SESSION['Unauthorized']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>
            <br>
            <!-- button for add admin -->
            <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primmary"> Add Food</a>

            <br><br>
        <table class="mytbl">
            <tr>
                <th>S.No.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php
            $sql="SELECT * FROM tbl_food";
            $res=mysqli_query($con,$sql);
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $image_name=$row['image_name'];
                    $featured=$row['faetured'];
                    $active=$row['active'];
                    ?>
                <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $title;?></td>
                <td><?php echo $price;?></td>
                <td>
                    <?php 
                        if($image_name=="")
                        {
                            echo "<div class='error'> Image Not Added </div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px" alt="">
                            <?php
                        }
                    ?>
                </td>
                <td><?php echo $featured;?></td>
                <td><?php echo $active;?></td>
                <td>
                <a href="<?php echo SITEURL;?>admin/Updatefood.php?id=<?php echo $id;?>" class="btn-Secondary"> Update food</a>
                <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger"> Delete food</a>
                </td>
            </tr>
                    <?php
                }
            }
            else
            {
                echo "<tr><td colspan='7' class='error'>Food not Added Yet</td> </tr>";
            }
            ?>
            
            
        </table>
    </div>    
</div>
    <!-- Main Section end -->
<?php include('partial/footer.php'); ?>