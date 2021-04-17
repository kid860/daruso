
var eventTable;

$(document).ready(function(){
    'use strict'
    feather.replace();

    $('#navEvents').addClass('active');
	$('#navEvents').siblings().removeClass('active');

    $('#summer').summernote({
        placeholder: 'This is a placeholder',
        tabsize: 2,
        height: 130,
        focus: true
    });

    // Form validation and submission for the event items
    eventTable = $('#eventTable').DataTable({
      'ajax': './php_action/fetchEventItems.php',
      'order': []
    });

    // Add Toggle
    $("#addToggle").click(function(){
      $(".addEvent").toggle(300);
    });

    $("#uploadEvent").unbind('submit').bind('submit', function(e) {	
      e.preventDefault();
      // form validation
      var title = $("#title").val();		
      var details = $(".note-editor.note-frame.panel.panel-default .note-editable p").html();

      if(title == "") {
        $("#title").closest('.center-block').after('<p class="text-danger">Heading field is required</p>');
        $('#title').closest('.form-group').addClass('has-error');
        }	else {
        // remove error text field
        $("#title").find('.text-danger').remove();
        // success out for form 
        $("#title").closest('.form-group').addClass('has-success');	  	
      }	// /else

      if(details == "") {
        $("#summer").closest('.center-block').after('<p class="text-danger">Heading field is required</p>');
        $('#summer').closest('.form-group').addClass('has-error');
        }	else {
        // remove error text field
        $("#summer").find('.text-danger').remove();
        // success out for form 
        $("#summer").closest('.form-group').addClass('has-success');	  	
      }	


      if(title) {
        var form = $(this);
        var formData = new FormData(this);
        formData.append("details", details);
        
        $.ajax({
          url : form.attr('action'),
          type: form.attr('method'),
          data: formData,
          processData: false,
          cache: false,
          contentType: false,
          dataType: "json",
          success: function(response) {
              if(response.success == true) {

                  // update the event table
                  eventTable.ajax.reload(null, false);

                  // add success messages
                  $(".uploadEventMsg").html('<div class="alert alert-success">'+
                      '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                      '<strong><i class="fa fa-check"></i></strong> '+ response.messages +
                  '</div>');

                  // remove the messages
                  $(".alert-success").delay(500).show(10, function() {
                          $(this).delay(3000).hide(10, function() {
                              $(this).remove();
                          });
                      }); // /.alert
                  } else {

                  // remove success messages
                  $(".uploadEventMsg").html('<div class="alert alert-success">'+
                      '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                      '<strong><i class="fa fa-check"></i></strong> '+ response.messages +
                  '</div>');

                  // remove the mesages
                  $(".alert-success").delay(500).show(10, function() {
                      $(this).delay(3000).hide(10, function() {
                          $(this).remove();
                      });
                  }); // /.alert

              } // /error
          }// /success function
        });
      }
    });

});//document

  // remove Event 
function removeEvent(eventId = null) {
	if(eventId) {
		// remove event button clicked
		jQuery(function(){
      $("#removeEventBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeEventBtn").button('loading');
			$.post('./php_action/removeEvent.php',
				{eventId: eventId},
				function(response) {
					// loading remove button
					$("#removeEventBtn").button('reset');
					if(response.success == true) {
						// remove event modal
						$("#removeEventModal").modal('hide');

						// update the event table
						eventTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="fa fa-check"></i></strong> Succesfully Removed</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						} else {

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
              '<strong><i class="fa fa-check"></i></strong> Succesfully Removed</div>');
              
						$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

          } // /error
          location.reload();
				} // /success function
			); // /ajax fucntion to remove the event
			return false;
      }); // /remove  btn clicked
    });
	} // /if eventid
} // /remove event function

  