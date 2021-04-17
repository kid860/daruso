<?php
    require_once 'core.php';  

  $sql = "SELECT * FROM gallery";
  $query = $connect->query($sql);

  $output = array('data' => array());
    $x = 1;

  if($query->num_rows > 0) { 

    while($row = $query->fetch_array()) {		
        $id = $row[0];

        $imageUrl = substr($row[1], 3);
        $galleryImage = "<img class='img-round gallery-image".$id."'  src='".$imageUrl."')'/>";

        $button = '<!-- Single button -->
        <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <b>Action</b> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a type="button" data-toggle="modal" data-target="#removeGalleryModal" onclick="removeGallery('.$id.')"> <i class="fa fa-trash"></i> Remove</a></li>       
        </ul>
        </div>';

        $output['data'][] = array( 
            $x,
            $galleryImage,
            $row[2],//Date
            $row[3],//Caption
            $row[4],//Govt
            $button,
            $imageUrl
        ); 
        $x++;
    } // /while
  }

  $connect->close();
  echo json_encode($output);

?>