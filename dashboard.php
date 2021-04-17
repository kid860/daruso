  <?php
    require_once 'php_action/core.php'; 

    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Your session has expired! <a href='login.php'>Login here</a>";
    }
    
    if(!(isset($_SESSION['loggedin']))) {
      header('location: index.php');
      exit;
    }else{ require_once 'header2.php';}
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" onload="loadImageFile();">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Home</h1>
        <button class="btn btn-outline-primary justify-content-right m-4" id="addToggle">Add Slider</button>
      </div>

      <div class="border rounded p-4 addSlider" style="display: none">
        <form id="uploadSlider" method="POST" action="./php_action/addSlider.php" enctype="multipart/form-data">
          <h3>Add Slider Item</h3>
          <div id="uploadSliderMsg"></div>
          <hr>
          <div class="form-group row">
            
            <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
            <div class="col-sm-10">
                <table>
                  <tbody>
                    <tr>
                      <td><input id="upload-Image" name="upload_image" type="file" onchange="loadImageFile();" required /></td>
                    </tr>
                    <tr style="display:none">
                      <td>Origal Img - <img id="original-Img"/></td>
                    </tr>
                    <tr>
                      <td><img class="py-2" style="width:50%; height:50%" id="upload-Preview" required/></td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>

          <div class="form-group row">
            <label for="heading" class="col-sm-2 col-form-label">Heading</label>
            <div class="col-sm-10">
              <input type="text" class="form-control heading" placeholder="Slider heading" id="heading" required name="heading">
            </div>
          </div>

          <div class="form-group row">
            <label for="sub-heading" class="col-sm-2 col-form-label">Sub-Heading</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control sub-heading" id="summer" name="sub_heading" placeholder="Slider sub-heading" required></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="external-link" class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="link" name="link" placeholder="Slider optional link to a reference">
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-success" id="submitSlider" name="submitSlider"> Save </button>
            </div>
          </div>
        </form><br><br>
      </div>
      
      <div class="table-responsive p-3">
        <table id="sliderTable" class="table table-bordered text-center border rounded">
          <tbody>
          <thead class="thead-dark">
            <tr>
                  <th>S.no</th>
                  <th>Image</th>
                  <th>Heading</th>
                  <th>Subheading</th>
                  <th>Link</th>
                  <th>Action</th>
            </tr>
          </thead>
        </table>
      </div><br>

    <!-- remove Slider -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeSliderModel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <div class="remove-messages"></div>
            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Slider</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <p>Do you really want to remove ?</p>
        </div>
        <div class="modal-footer removeSliderFooter">
            <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
            <button type="button" class="btn btn-danger" id="removeSliderBtn" data-loading-text="Loading..." onclick=""> <i class="fa fa-trash"></i> Remove</button>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /remove brand -->

    </main>
  </div>
</div>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<link href='assets/plugins/fullcalendar/main.css' rel='stylesheet' />
<script src='assets/plugins/fullcalendar/main.js'></script>

<script src="custom/js/dashboard.js"></script>

<?php 
  if(!(isset($_SESSION['loggedin']))) {
    header('location: index.php');
    exit;
  }else{ require_once 'footer2.php';}
?>
</body>
</html>
