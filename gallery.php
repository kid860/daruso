<!doctype html>
<html lang="en">
  <head>
    <!-- Custom css -->
    <link href="custom/css/gallery.css" rel="stylesheet">
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
        <h1 class="h2">Gallery</h1><br>
        <h6>Drag And Drop files to post to the gallery</h6>
      </div>
      <!-- Gallery -->
      <section id="gallery" class="pt-3">
        <!-- Gallery Tab -->
        <center>
        <div class="gallery-messages p-2"></div>
        <ul class="nav nav-pills gallery-nav justify-content-center" id="pills-tab" role="tablist">
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
            <div class="gallery p-4">
              <div class="gallery-cabinet">
                <?php
                    echo "<div class='div1 gallery-container'> 
                            <div class='dropzone justify-content-center' id='uploadfile'>
                              <span>Upload File Here</span><br>
                              <input type='file' name='div' id='div1'/>
                            </div>
                          </div>
                          <!-- Modal -->
                            <div class='mymodal gallery-detail' tabindex='-1'>
                              <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
                                  </div>
                                  <div class='modal-body'>
                                    <input type='date' class='form-control galleryDate' name='galleryDate' placeholder='Date'/><br>
                                    <input type='text' class='form-control galleryCaption' name='galleryCaption' placeholder='Image Caption'/><br>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' id='submitGallery' class='btn btn-primary'>Done</button>
                                  </div>
                                </div>
                              </div>
                            </div>";
                ?>
              </div>
            </div>
          </div>

          <!-- Judicial -->
          <div class="tab-pane fade" id="pills-judicial" role="tabpanel" aria-labelledby="pills-judicial-tab">
            <div class="gallery p-4">
              <div class="gallery-judicial">
                
              <?php
                    echo "<div class='div1 gallery-container'> 
                            <div class='dropzone justify-content-center' id='uploadfile'>
                              <span>Upload File Here</span><br>
                              <input type='file' name='div' id='div1'/>
                            </div>
                          </div>
                          <!-- Modal -->
                            <div class='mymodal gallery-detail' tabindex='-1'>
                              <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
                                  </div>
                                  <div class='modal-body'>
                                    <input type='date' class='form-control galleryDate' name='galleryDate' placeholder='Date'/><br>
                                    <input type='text' class='form-control galleryCaption' name='galleryCaption' placeholder='Image Caption'/><br>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' id='submitGallery' class='btn btn-primary'>Done</button>
                                  </div>
                                </div>
                              </div>
                            </div>";
                ?>
              </div>
            </div>
          </div>

          <!-- USCR -->
          <div class="tab-pane fade" id="pills-uscr" role="tabpanel" aria-labelledby="pills-uscr-tab">
            <div class="gallery p-4">
              <div class="gallery-uscr">
                
              <?php
                    echo "<div class='div1 gallery-container'> 
                            <div class='dropzone justify-content-center' id='uploadfile'>
                              <span>Upload File Here</span><br>
                              <input type='file' name='div' id='div1'/>
                            </div>
                          </div>
                          <!-- Modal -->
                            <div class='mymodal gallery-detail' tabindex='-1'>
                              <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
                                  </div>
                                  <div class='modal-body'>
                                    <input type='date' class='form-control galleryDate' name='galleryDate' placeholder='Date'/><br>
                                    <input type='text' class='form-control galleryCaption' name='galleryCaption' placeholder='Image Caption'/><br>
                                  </div>
                                  <div class='modal-footer'>
                                    <button type='button' id='submitGallery' class='btn btn-primary'>Done</button>
                                  </div>
                                </div>
                              </div>
                            </div>";
                ?>
              </div>
            </div>
          </div>
        </div>
        </center>
      </section><hr>

      <div class="table-responsive p-3">
        <table id="galleryTable" class="table table-bordered text-center border rounded">
          <tbody>
          <thead class="thead-dark">
            <tr>
                  <th>S.no</th>
                  <th>Image</th>
                  <th>Date</th>
                  <th>Caption</th>
                  <th><b>Govt</b></th>
                  <th><b>Action</b></th>
            </tr>
          </thead>
        </table>
      </div><br>

      <!-- remove Gallery -->
      <div class="modal fade" tabindex="-1" role="dialog" id="removeGalleryModal">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <div class="remove-messages"></div>
                  <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove gallery</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <p>Do you really want to remove ?</p>
              </div>
              <div class="modal-footer removeGalleryFooter">
                  <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
                  <button type="button" class="btn btn-danger" id="removeGalleryBtn" data-loading-text="Loading..."> <i class="fa fa-trash"></i> Remove</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </main>
  </div>
</div>

<script src="custom/js/gallery.js"></script>

<?php 
  if(!(isset($_SESSION['loggedin']))) {
    header('location: index.php');
    exit;
  }else{ require_once 'footer2.php';}
?>
</body>
</html>
