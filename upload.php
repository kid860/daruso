<?php

require_once 'php_action/core.php';

$return_arr = array();

if($_POST){

    $firstname 		= $_POST['firstname'];
    $secondname 		= $_POST['secondname'];
    $position 		= $_POST['position'];
    $role 		= $_POST['value'];
    $year 		= $_POST['year'];
    $govt 		= $_POST['govt'];
    /* Getting file name */
    $filename = $_FILES['file']['name'];

    /* Getting File size */
    $filesize = $_FILES['file']['size'];

    /* Location */
    $location = "assets/images/upload/".$filename;

    $type = explode('.', $_FILES['file']['name']);
    $type = $type[count($type)-1];
    
    $check= "SELECT `year`, `role` FROM `leaders` WHERE `role` = '$role' AND `year` = '$year' AND `govt` = '$govt'";
    $query = $connect->query($check);

    if($query->num_rows > 0) {
        $return_arr = array(
            "message" => " Delete the Leader if you want to update <br> Unsuccesfull upload"
        );
    }
    
    else{
        /* Upload file */
        if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                
                $sql = "INSERT INTO `leaders`(`url`, `first_name`, `last_name`, `position`, `year`, `role`, `govt`) 
                VALUES ('$location','$firstname ','$secondname','$position','$year','$role','$govt')";
        
                if($connect->query($sql) === TRUE) {

                    $return_arr = array(
                        "name" => $filename,
                        "size" => $filesize, 
                        "src"=> $location,
                        "message"=> " Succesfully Uploaded"
                    );
                } else {
                    $return_arr = array(
                        "message" => " Failed Upload"
                    );
                }
        
            }
        }
    }

    

    echo json_encode($return_arr);
}

