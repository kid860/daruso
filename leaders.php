<!doctype html>
<html lang="en">
  <head>
    <!-- Custom css -->
    <link href="custom/css/leaders.css" rel="stylesheet">
</head>

<?php
    require_once 'php_action/core.php'; 
    
    if(!(isset($_SESSION['loggedin']))) {
      header('location: index.php');
      exit;
    }else{ require_once 'header2.php';}
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Leaders</h1><br>
        <h6>Drag And Drop files in their repective locations according to the Layout of the site.</h6>
      </div>
      <!-- Leaders -->
      <section id="leaders" class="pt-3">
        <!-- Leader Tab -->
        <center>
        <div class="leader-messages p-2"></div>
        <ul class="nav nav-pills leader-nav justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-cabinet-tab" data-toggle="pill" href="#pills-cabinet" role="tab" aria-controls="pills-cabinet" aria-selected="true">Cabinet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-judicial-tab" data-toggle="pill" href="#pills-judicial" role="tab" aria-controls="pills-judicial" aria-selected="false">Judicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-uscr-tab" data-toggle="pill" href="#pills-uscr" role="tab" aria-controls="pills-uscr" aria-selected="false">USCR</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- Cabinet -->
          <div class="tab-pane fade show active" id="pills-cabinet" role="tabpanel" aria-labelledby="pills-cabinet-tab">
            <div class="leaders p-4">
              <div class="leaders-cabinet">
                <?php
                  for ($i=1; $i <= 27 ; $i++) { 
                    echo "<div class='div".$i." leader-container'> 
                            <div class='dropzone justify-content-center' id='uploadfile'>
                              <span>Upload File Here</span><br>
                              <input type='text' class='divValue' value='".$i."' hidden/>
                              <input type='file' name='div' id='div".$i."'/>
                            </div>
                          </div>
                          <!-- Modal -->
                            <div class='mymodal leader-detail".$i."' tabindex='-1'>
                              <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
                                  </div>
                                  <div class='modal-body'>
                                    <input type='text' class='form-control leaderFirst' name='leaderFirst' placeholder='First Name'/><br>
                                    <input type='text' class='form-control leaderSecond' name='leaderSecond' placeholder='Second Name'/><br>
                                    <input type='text' class='form-control leaderPosition' name='leaderPosition' placeholder='Position'/><br>
                                    <input type='text' class='form-control leaderYear' name='leaderYear' placeholder='Year'/><br>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' id='submitLeader' class='btn btn-primary'>Done</button>
                                  </div>
                                </div>
                              </div>
                            </div>";
                  }
                ?>
              </div>
            </div>
          </div>

          <!-- Judicial -->
          <div class="tab-pane fade" id="pills-judicial" role="tabpanel" aria-labelledby="pills-judicial-tab">
            <div class="leaders p-4">
              <div class="leaders-judicial">
                
              <?php
                  for ($i=1; $i <= 3 ; $i++) { 
                    echo "<div class='div".$i." leader-container'> 
                            <div class='dropzone justify-content-center' id='uploadfile'>
                              <span>Upload File Here</span><br>
                              <input type='text' class='divValue' value='".$i."' hidden/>
                              <input type='file' name='div' id='div".$i."'/>
                            </div>
                          </div>
                          <!-- Modal -->
                            <div class='mymodal leader-detail".$i."' tabindex='-1'>
                              <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
                                  </div>
                                  <div class='modal-body'>
                                    <input type='text' class='form-control leaderFirst' name='leaderFirst' placeholder='First Name'/><br>
                                    <input type='text' class='form-control leaderSecond' name='leaderSecond' placeholder='Second Name'/><br>
                                    <input type='text' class='form-control leaderPosition' name='leaderPosition' placeholder='Position'/><br>
                                    <input type='text' class='form-control leaderYear' name='leaderYear' placeholder='Year'/><br>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' id='submitLeader' class='btn btn-primary'>Done</button>
                                  </div>
                                </div>
                              </div>
                            </div>";
                  }
                ?>
              </div>
            </div>
          </div>

          <!-- USCR -->
          <div class="tab-pane fade" id="pills-uscr" role="tabpanel" aria-labelledby="pills-uscr-tab">
            <div class="leaders p-4">
              <div class="leaders-uscr">
                
              <?php
                  for ($i=1; $i <= 5 ; $i++) { 
                    echo "<div class='div".$i." leader-container'> 
                            <div class='dropzone justify-content-center' id='uploadfile'>
                              <span>Upload File Here</span><br>
                              <input type='text' class='divValue' value='".$i."' hidden/>
                              <input type='file' name='div' id='div".$i."'/>
                            </div>
                          </div>
                          <!-- Modal -->
                            <div class='mymodal leader-detail".$i."' tabindex='-1'>
                              <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
                                  </div>
                                  <div class='modal-body'>
                                    <input type='text' class='form-control leaderFirst' name='leaderFirst' placeholder='First Name'/><br>
                                    <input type='text' class='form-control leaderSecond' name='leaderSecond' placeholder='Second Name'/><br>
                                    <input type='text' class='form-control leaderPosition' name='leaderPosition' placeholder='Position'/><br>
                                    <input type='text' class='form-control leaderYear' name='leaderYear' placeholder='Year'/><br>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' id='submitLeader' class='btn btn-primary'>Done</button>
                                  </div>
                                </div>
                              </div>
                            </div>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        </center>
      </section><hr>

      <div class="table-responsive p-3">
        <table id="leaderTable" class="table table-bordered text-center border rounded">
          <tbody>
          <thead class="thead-dark">
            <tr>
                  <th>S.no</th>
                  <th>Image</th>
                  <th>First Name</th>
                  <th>Second Name</th>
                  <th><b>Position</b></th>
                  <th>Year</th>
                  <th>Role</th>
                  <th>Govt</th>
                  <th>Action</th>
            </tr>
          </thead>
        </table>
      </div><br>

      <!-- remove Leader -->
      <div class="modal fade" tabindex="-1" role="dialog" id="removeLeaderModal">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <div class="remove-messages"></div>
                  <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove leader</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <p>Do you really want to remove ?</p>
              </div>
              <div class="modal-footer removeLeaderFooter">
                  <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
                  <button type="button" class="btn btn-danger" id="removeLeaderBtn" data-loading-text="Loading..."> <i class="fa fa-trash"></i> Remove</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </main>
  </div>
</div>

<script src="custom/js/leaders.js"></script>

<?php 
  if(!(isset($_SESSION['loggedin']))) {
    header('location: index.php');
    exit;
  }else{ require_once 'footer2.php';}
?>
</body>
</html>
