<?php include('../config/Contants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin1.css">
    <style>
        
.login
{
    border: 1px solid gray;
    margin: 10% auto;
    width:20%;
    padding:2%;
}
 </style>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <!-- login form start -->
        <form action="" method="POST" class="text-center">
            Username:
            <br>
            <input type="text" name="username" id="" placeholder="Enter username"><br><br>
            Password:<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" class="btn-primmary">
        </form>
        <!-- login form end -->
            <br>
        <p class="text-center"> Created by <a href="#"> Paras goyal</a></p>
    </div>
    <?php
    // check the button is clicked or not
    if(isset($_POST['submit']))
    {
        //  $username=$_POST['username'];
        // $password=md5($_POST['password']);
         $username=mysqli_real_escape_string($con,$_POST['username']);
         $raw_password=md5($_POST['password']);
         $password=mysqli_real_escape_string($con, $raw_password);
        $sql=" SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            $_SESSION['login']="<div class='success'> Login Successful</div>.";
            $_SESSION['user']=$username;// to check user is logged in or not
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            
            $_SESSION['login']="<div class='error'> Username and Password Did not match</div>.";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
    ?>
</body>
</html>