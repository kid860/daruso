<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$eventId = $_POST['eventId'];

if($eventId) { 

 $sql = "DELETE FROM events WHERE id = {$eventId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while removing Event";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST