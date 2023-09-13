<?php include('partial-front/menu.php');?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            

            <?php
            // create sql query to display categories form database
            $sql="SELECT * FROM tbl_category WHERE active='Yes'";
            // Execute the query
            $res=mysqli_query($con,$sql);
            // count the rows whether query is present or not
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                // category is found
                while($row=mysqli_fetch_assoc($res))
                {
                    // get the values
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                        <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>"">
                            <div class="box-3 float-container">
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'> Image Not Available</div>";
                                    }
                                    else
                                    {
                                        // Imange available
                                        ?>
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                           

                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                        </a>
                    <?php
                }
            }
            else
            {
                // category is not found
                echo "<div class='error'>Category not found</div>";
            }
            ?>
       

           
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include('partial-front/footer.php');?>
