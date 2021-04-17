<?php
    require_once 'core.php'; 
  ?>

  <?php 

  $sql = "SELECT * FROM about";
  $query = $connect->query($sql);
  $countSlider = $query->num_rows;

  $output = array('data' => array());
    $x = 1;
  if($query->num_rows > 0) { 

    while($row = $query->fetch_array()) {		
      $aboutId = $row[0];

      $imageUrl = substr($row[1], 3);
	    $aboutImage = "<img class='img-round ".$aboutId."' id='about-image' src='".$imageUrl."')'/>";

      $button = '<!-- Single button -->
      <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Action</b> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a type="button" data-toggle="modal" data-target="#removeAboutModel" onclick="removeAbout('.$aboutId.')"> <i class="fa fa-trash"></i> Remove</a></li>       
        </ul>
      </div>';

      $output['data'][] = array( 
        $x,
        $aboutImage,
        $row[2],
        $row[3],
        $button
      ); 
      $x++;
    } // /while
  }

  $connect->close();
  echo json_encode($output);

?>

