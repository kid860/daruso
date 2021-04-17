<?php
    require_once 'php_action/core.php'; 
    
    if(!(isset($_SESSION['loggedin']))) {
      header('location: index.php');
      exit;
    }else{ require_once 'header2.php';}
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Events</h1>
        <button class="btn btn-outline-primary justify-content-right m-4" id="addToggle">Add Event</button>
      </div>

      <div class="border rounded p-4 addEvent" style="display: none">
        <form id="uploadEvent" action='./php_action/addEvent.php' method="POST" enctype="multipart/form-data">
          <h3>Add Event</h3>
          <hr>

          <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control date" placeholder="Event Title" id="date" required name="date">
            </div>
          </div>

          <div class="form-group row">
            <label for="heading" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control title" placeholder="Event Title" id="title" required name="title">
            </div>
          </div>

          <div class="form-group row">
            <label for="Details" class="col-sm-2 col-form-label">Details</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control details" id="summer" name="details"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-success" id="submitEvent" name="submitEvent"> Save </button>
            </div>
          </div>
          <div class="uploadEventMsg"></div>
        </form> <br><br>
      </div>
      
      <div class="table-responsive p-3">
        <table id="eventTable" class="table table-bordered text-center border rounded">
          <tbody>
          <thead class="thead-dark">
            <tr>
                  <th>S.no</th>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Details</th>
                  <th>Action</th>
            </tr>
          </thead>
        </table>
      </div><br>

    <!-- remove Event -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeEventModel">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <div class="remove-messages"></div>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to remove ?</p>
            </div>
            <div class="modal-footer removeEventFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
                <button type="button" class="btn btn-danger" id="removeEventBtn" data-loading-text="Loading..."> <i class="fa fa-trash"></i> Remove</button>
            </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /remove brand -->

    </main>
  </div>
</div>

<script src="assets/plugins/moment/moment.min.js"></script>

<script src="custom/js/events.js"></script>

<?php 
  if(!(isset($_SESSION['loggedin']))) {
    header('location: index.php');
    exit;
  }else{ require_once 'footer2.php';}
?>
</body>
</html>
