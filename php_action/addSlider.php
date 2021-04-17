<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$heading 			= $_POST['heading'];
	$link 			= $_POST['link'];
	$sub_heading 		= $_POST['sub_heading'];

	$type = explode('.', $_FILES['upload_image']['name']);
	$type = $type[count($type)-1];		
	$url = '../assets/images/slider/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['upload_image']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['upload_image']['tmp_name'], $url)) {

				$sql = "INSERT INTO `slider`(`image`, `heading`, `subheading`, `link`) VALUES ('$url','$heading','$sub_heading','$link')";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}
				
			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST