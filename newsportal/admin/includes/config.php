<?php
define('DB_SERVER','us-cdbr-east-03.cleardb.com');
define('DB_USER','b786b85bb244b4');
define('DB_PASS' ,'9c9e283c');
define('DB_NAME','heroku_c6f35d087a69174');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
