<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$title 		= $_POST['title'];
    $details 	= $_POST['details'];
    $event_date 	= $_POST['date'];

    $sql = "INSERT INTO `events`(`date`, `title`, `details`) VALUES ('$event_date','$title','$details')";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Added";	
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while adding the members";
    }	

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST