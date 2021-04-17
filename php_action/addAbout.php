<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$heading 		= $_POST['heading'];
	$paragraph 		= $_POST['paragraph'];

	$type = explode('.', $_FILES['upload_image']['name']);
	$type = $type[count($type)-1];		
	$url = '../assets/images/about/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {	

			$sql = "INSERT INTO `about`(`image`, `heading`, `paragraph`) VALUES ('$url','$heading','$paragraph')";

			if($connect->query($sql) === TRUE) {
				move_uploaded_file($_FILES['upload_image']['tmp_name'], $url);
				$valid['success'] = true;
				$valid['messages'] = "Successfully Added";	
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error while adding the members";
			}
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST