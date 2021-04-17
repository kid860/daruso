<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['userId']) && isset($_SESSION['loggedin'])) {
	header('location: dashboard.php');	
} 

$errors = array();

if(isset($_POST['submit_user'])) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);
		//$result = mysqli_query($connect, $sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];
				$username = $value['username'];
				
				// set session
				$_SESSION['userId'] = $user_id;
				$_SESSION['username'] = $username;
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['start'] = time(); // Taking now logged in time.
            	// Ending a session in 30 minutes from the starting time.
            	$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
				header('location: dashboard.php');
			} else{
				
				$errors[] = "Incorrect username/password combination";
			} // /else
		} else {		
			$errors[] = "Username doesnot exists";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Winstone Mjule">
    <title>DARUSO</title>
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="assets/images/logo_ud.png" sizes="180x180">
<link rel="icon" href="assets/images/logo_ud.png" sizes="32x32" type="image/png">
<link rel="icon" href="assets/images/logo_ud.png" sizes="16x16" type="image/png">
<link rel="mask-icon" href="assets/images/logo_ud.png" color="#563d7c">
<!-- Favicon -->
<link rel="shortcut icon" type="image/png" href="assets/images/logo_ud.png"/>


    <style>
      html{
        padding: 0;
        margin: 0;
      }
      body{
        overflow-x: hidden;
      }
      .form-control{
        width: 60%;
      }

      form{
        /* background-color: #f2f2f2; */
        color: #737373;
        border: 1px solid #8c8c8c;
        height: 65vh;
        width: 30%;
        border-radius: 10px;
	  }
	  
	  .ud_logo{
		width: 5%;
		height: 5%;
	  }

      @media (max-width: 768px) {
        .form-control{
        width: 40%;
        }
      }
    </style>
  </head>
  <body>
    <center>
    <div class="p-4">
	  	<img class="ud_logo py-3" src="assets/images/logo_ud.png"/>
		<h5 class="h5 mb-3 font-weight-normal">DARUSO</h5>
		<form class="form-signin" style="padding: 3% 0" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
			<h3 class="h3 mb-3 font-weight-normal">Please sign in</h3>

			<!-- Errors -->
			<div class="messages">
				<?php if($errors) {
					foreach ($errors as $key => $value) {
						echo '<div class="alert" style="color:red;" role="alert">
						'.$value.'</div>';										
						}
					} ?>
			</div>

			<label for="inputName" class="sr-only">Username</label>
			<input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus autocomplete="off"><br>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required autocomplete="off"><br>
			<div class="checkbox mb-3">
				<label>
				<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary" type="submit" name="submit_user">Sign in</button>
			<!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p> -->
		</form>
	</div>
    </center>
</body>
</html>
