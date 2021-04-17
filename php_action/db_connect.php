<?php 	

$localhost = "us-cdbr-east-03.cleardb.com";
$username = "b786b85bb244b4";
$password = "9c9e283c";
$dbname = "heroku_c6f35d087a69174";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} 

else {
  // echo "Successfully connected";
}

?>
