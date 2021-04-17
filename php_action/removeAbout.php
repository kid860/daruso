<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$aboutId = $_POST['aboutId'];

if($aboutId) { 

 $sql = "DELETE FROM about WHERE id = {$aboutId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while removing the About Item";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST