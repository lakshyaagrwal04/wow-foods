<?php include('partial/header.php'); ?>


    <!-- Main Section Start -->
    <div class="main-section">
        <div class="wraper">
            <h1>admin</h1>
            <br>
            <?php
                if(isset($_SESSION['add']))
                {
                    // display session message
                    echo $_SESSION['add'];
                    // remove  session message
                    unset($_SESSION['add']); 
                }
                
                if(isset($_SESSION['delete']))
                {
                    // display session message
                    echo $_SESSION['delete'];
                    // remove  session message
                    unset($_SESSION['delete']); 
                }
                if(isset($_SESSION['update']))
                {
                    // display session message
                    echo $_SESSION['update'];
                    // remove  session message
                    unset($_SESSION['update']); 
                }
                
                
                if(isset($_SESSION['pwd-not-match']))
                {
                    // display session message
                    echo $_SESSION['pwd-not-match'];
                    // remove  session message
                    unset($_SESSION['pwd-not-match']); 
                }
                if(isset($_SESSION['user-not-found']))
                {
                    // display session message
                    echo $_SESSION['user-not-found'];
                    // remove  session message
                    unset($_SESSION['user-not-found']); 
                }
                
                if(isset($_SESSION['pwd-change']))
                {
                    // display session message
                    echo $_SESSION['pwd-change'];
                    // remove  session message
                    unset($_SESSION['pwd-change']); 
                }
                
            ?>
            <br><br>
            <!-- button for add admin -->
            <a href="add_admin.php" class="btn-primmary"> Add Admin</a>

            <br><br>
        <table class="mytbl">
            <tr>
                <th>S.No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php
            // query to gel all admin
            $sql="SELECT * FROM tbl_admin";
            // exceuting the Query
            $res=mysqli_query($con,$sql);
            // check the query is inserted or not
            if($res==TRUE)
            {
                // count the rows in our database
                $count=mysqli_num_rows($res);//funxtion to get all rows from database
                // creating a variable and assign value
                $sn=1;
                // check the num of rowa
                if($count>0)
                {
                    // we have  data in database
                    while ($rows=mysqli_fetch_assoc($res)) 
                    {
                        # code...
                        $id=$rows['id'];
                        $fullname=$rows['fullname'];
                        $username=$rows['username'];
                     ?>
                        <tr>
                <td><?php echo $sn++ ?></td>
                <td><?php echo $fullname?></td>
                <td><?php echo $username ?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/updatePassword.php?id=<?php echo $id;?>" class="btn-primmary"> Change Passowrd</a>
                <a href="<?php echo SITEURL;?>admin/updateAdmin.php?id=<?php echo $id;?>" class="btn-Secondary"> Update Admin</a>
                <a href="<?php echo SITEURL;?>admin/deleteAdmin.php?id=<?php echo $id;?>" class="btn-danger"> Delete Admin</a>
                </td>
            </tr>
                     <?php   
                    }
                }
                else
                {
                    // we do no data in database 
                }
            }
            ?>
        </table>
    </div>    
</div>
    <!-- Main Section end -->
<?php include('Partial/footer.php'); ?>