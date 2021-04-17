
<?php
    require_once 'php_action/core.php'; 
    
    if(!(isset($_SESSION['loggedin']))) {
        header('location: index.php');
        exit;
    }else{ require_once 'header2.php';}
?>

<?php 
$sql = "SELECT * FROM users";
$query = $connect->query($sql);

if($query->num_rows > 0) {
	$result = $query->fetch_assoc();
}

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

	<div class="panel-body">
		<h4 style="padding: 20px 0px">
			Settings
		</h4> <!-- /panel-heading -->
		<hr>
		<!-- Profile settings -->
		<div class="tab-content" id="myTabContent">
			<div class="container panel-body border rounded ">

				<form action="php_action/changePassword.php" method="post" class="form-horizontal p-4" id="changePasswordForm">
					<fieldset>
						<b>Change Password</b>

						<div class="changePasswordMessages"></div>

						<input type="text" name="username" hidden value="<?php echo $result['username']; ?>">

						<div class="form-group">
							<label for="password" class="col-sm-4 control-label">Current <?php echo $result['username']; ?> Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
							</div>
						</div>

						<div class="form-group">
							<label for="npassword" class="col-sm-4 control-label">New <?php echo $result['username']; ?> password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
							</div>
						</div>

						<div class="form-group">
							<label for="cpassword" class="col-sm-4 control-label">Confirm <?php echo $result['username']; ?> Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Changes </button>
							</div>
						</div>

					</fieldset>
				</form>
			</div>
		</div>
	</div>		
	
</main>

<script src="custom/js/setting.js"></script>

<?php 
  if(!(isset($_SESSION['loggedin']))) {
    header('location: index.php');
    exit;
  }else{ require_once 'footer2.php';}
?>
