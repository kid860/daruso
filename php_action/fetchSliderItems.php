<?php
    require_once 'core.php'; 
  ?>

  <?php 

  $sql = "SELECT * FROM slider";
  $query = $connect->query($sql);
  $countSlider = $query->num_rows;

  $output = array('data' => array());
    $x = 1;
  if($query->num_rows > 0) { 

    while($row = $query->fetch_array()) {		
      $sliderId = $row[0];

      $imageUrl = substr($row[1], 3);
      $sliderImage = "<img class='img-round carousel-image".$sliderId."' id='carousel-image' src='".$imageUrl."')'/>";
      $link = $row[4];

      $button = '<!-- Single button -->
      <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Action</b> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a type="button" data-toggle="modal" data-target="#removeSliderModel" onclick="removeSlider('.$sliderId.')"> <i class="fa fa-trash"></i> Remove</a></li>       
        </ul>
      </div>';

      $output['data'][] = array( 
        $x,
        $sliderImage,
        $row[2],
        $row[3],
        $link,
        $button
      ); 
      $x++;
    } // /while
  }

  $connect->close();
  echo json_encode($output);

?>

