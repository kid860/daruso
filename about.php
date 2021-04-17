<?php
    require_once 'php_action/core.php'; 
    
    if(!(isset($_SESSION['loggedin']))) {
      header('location: index.php');
      exit;
    }else{ require_once 'header2.php';}
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" onload="loadImageFile();">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">About</h1>
        <button class="btn btn-outline-primary justify-content-right m-4" id="addToggle">Add Item</button>
      </div>

      <div class="border rounded p-4 addAbout" style="display: none">
        <form id="uploadAbout" action='./php_action/addAbout.php' method="POST" enctype="multipart/form-data">
          <h3>Add About Item</h3>
          <hr>
          <div class="form-group row">
            
            <label for="image" class="col-sm-2 col-form-label">Image</label>
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
              <input type="text" class="form-control heading" placeholder="About Section heading" id="heading" required name="heading">
            </div>
          </div>

          <div class="form-group row">
            <label for="sub-heading" class="col-sm-2 col-form-label">Paragraph</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control paragraph" id="summer" name="paragraph"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-success" id="submitAbout" name="submitAbout"> Save </button>
            </div>
          </div>
          <div class="uploadAboutMsg"></div>
        </form> <br><br>
      </div>
      
      <div class="table-responsive p-3">
        <table id="aboutTable" class="table table-bordered text-center border rounded">
          <tbody>
          <thead class="thead-dark">
            <tr>
                  <th>S.no</th>
                  <th>Image</th>
                  <th>Heading</th>
                  <th>Subheading</th>
                  <th>Action</th>
            </tr>
          </thead>
        </table>
      </div><br>

    <!-- remove About -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeAboutModel">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <div class="remove-messages"></div>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove About</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to remove ?</p>
            </div>
            <div class="modal-footer removeAboutFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
                <button type="button" class="btn btn-danger" id="removeAboutBtn" data-loading-text="Loading..."> <i class="fa fa-trash"></i> Remove</button>
            </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /remove brand -->

    </main>
  </div>
</div>

<script src="assets/plugins/moment/moment.min.js"></script>

<script src="custom/js/about.js"></script>

<?php 
  if(!(isset($_SESSION['loggedin']))) {
    header('location: index.php');
    exit;
  }else{ require_once 'footer2.php';}
?>
</body>
</html>
