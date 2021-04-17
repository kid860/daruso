<?php
    require_once 'core.php'; 
  ?>

  <?php 

  $sql = "SELECT * FROM leaders";
  $query = $connect->query($sql);
  $countSlider = $query->num_rows;

  $output = array('data' => array());
    $x = 1;
  if($query->num_rows > 0) { 

    while($row = $query->fetch_array()) {		
      $id = $row[0];

      $imageUrl = $row[1];
      $leaderImage = "<img class='rounded leader-image ".$id."'  src='".$imageUrl."')'/>";

      $button = '<!-- Single button -->
      <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Action</b> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a type="button" data-toggle="modal" data-target="#removeLeaderModal" onclick="removeLeader('.$id.')"> <i class="fa fa-trash"></i> Remove</a></li>       
        </ul>
      </div>';

      $output['data'][] = array( 
        $x,
        $leaderImage,
        $row[2],//first
        $row[3],//second
        $row[4],//pos
        $row[5],//year
        $row[6],//role
        $row[7],//govt
        $button
      ); 
      $x++;
    } // /while
  }

  $connect->close();
  echo json_encode($output);

?>