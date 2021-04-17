<?php

require_once 'core.php';

$return_arr = array();

if($_POST){

    $date 		= $_POST['date'];
    $caption 	= $_POST['caption'];
    $govt 		= $_POST['govt'];

    /* Getting file name */
    $filename = $_FILES['file']['name'];
    /* Getting File size */
    $filesize = $_FILES['file']['size'];

    /* Location */
    $location = "../assets/images/gallery/".$filename;

    $type = explode('.', $_FILES['file']['name']);
    $type = $type[count($type)-1];

    /* Upload file */
    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
        if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
            
            $sql = "INSERT INTO `gallery`(`img`, `date`, `caption`, `govt`) 
            VALUES ('$location','$date','$caption','$govt')";
    
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
    
    echo json_encode($return_arr);
}

