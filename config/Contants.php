<!-- create Constant to store non reapeating values -->
<?php
// session start
session_start();
define('SITEURL','http://localhost/web-design/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','wow-food');

$con=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select=mysqli_select_db($con,DB_NAME) or die(mysqli_error());
?>