<?php
    require_once 'core.php'; 
  ?>

  <?php 

  $sql = "SELECT * FROM events";
  $query = $connect->query($sql);
  $countSlider = $query->num_rows;

  $output = array('data' => array());
    $x = 1;
  if($query->num_rows > 0) { 

    while($row = $query->fetch_array()) {		
      $eventId = $row[0];

      $button = '<!-- Single button -->
      <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Action</b> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a type="button" data-toggle="modal" data-target="#removeEventModel" onclick="removeEvent('.$eventId.')"> <i class="fa fa-trash"></i> Remove</a></li>       
        </ul>
      </div>';

      $output['data'][] = array( 
        $x,
        $row[1],
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

