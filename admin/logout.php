<?php
// database connection
include('../config/Contants.php');
// session destroy
session_destroy();
// redirect to admin login
header('location:'.SITEURL.'admin/login.php')
?>