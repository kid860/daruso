<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
    $galleryId = $_POST['galleryId'];

    if($galleryId) { 

        $sql = "DELETE FROM gallery WHERE id = {$galleryId}";

        if($connect->query($sql) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Removed";		
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while remove the brand";
        }
        
        $connect->close();

        echo json_encode($valid);
    }
 
} // /if $_POST