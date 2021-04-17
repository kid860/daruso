
var aboutTable;

$(document).ready(function(){
    'use strict'
    feather.replace();

    $('#navAbout').addClass('active');
	  $('#navAbout').siblings().removeClass('active');

    $('#summer').summernote({
        placeholder: 'This is a placeholder',
        tabsize: 2,
        height: 130,
        focus: true
    });

    // Form validation and submission for the about items
    aboutTable = $('#aboutTable').DataTable({
      'ajax': './php_action/fetchAboutItems.php',
      'order': []
    });

    // Add Toggle
    $("#addToggle").click(function(){
      $(".addAbout").toggle(300);
    });

    $("#uploadAbout").unbind('submit').bind('submit', function(e) {	
      e.preventDefault();
      // form validation
      var heading = $("#heading").val();		
      var paragraph = $(".note-editor.note-frame.panel.panel-default .note-editable p").html();
      var upload_image = document.getElementById("upload-Image").files[0];

      if(heading == "") {
        $("#heading").closest('.center-block').after('<p class="text-danger">Heading field is required</p>');
        $('#heading').closest('.form-group').addClass('has-error');
        }	else {
        // remove error text field
        $("#heading").find('.text-danger').remove();
        // success out for form 
        $("#heading").closest('.form-group').addClass('has-success');	  	
      }	// /else

      if(paragraph == "") {
        $("#summer").closest('.center-block').after('<p class="text-danger">Heading field is required</p>');
        $('#summer').closest('.form-group').addClass('has-error');
        }	else {
        // remove error text field
        $("#summer").find('.text-danger').remove();
        // success out for form 
        $("#summer").closest('.form-group').addClass('has-success');	  	
      }	


      if(heading && upload_image) {
        var form = $(this);
        var formData = new FormData(this);
        formData.append("paragraph", paragraph);
        
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

                  // update the about table
                  aboutTable.ajax.reload(null, false);

                  // add success messages
                  $(".uploadAboutMsg").html('<div class="alert alert-success">'+
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
                  $(".uploadAboutMsg").html('<div class="alert alert-success">'+
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

  var fileReader = new FileReader();
  var filterType = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

  fileReader.onload = function (event) {
    var image = new Image();
    
    image.onload=function(){
        document.getElementById("original-Img").src=image.src;
        var canvas=document.createElement("canvas");
        var context=canvas.getContext("2d");
        canvas.width=image.width/4;
        canvas.height=image.height/4;
        context.drawImage(image,
            0,
            0,
            image.width,
            image.height,
            0,
            0,
            canvas.width,
            canvas.height
        );
        
        document.getElementById("upload-Preview").src = canvas.toDataURL();
        
    }
    image.src=event.target.result;
  };

  var loadImageFile = function () {
    var uploadImage = document.getElementById("upload-Image");
    
    //check and retuns the length of uploded file.
    if (uploadImage.files.length === 0) { 
      return; 
    }
    
    //Is Used for validate a valid file.
    var uploadFile = document.getElementById("upload-Image").files[0];
    if (!filterType.test(uploadFile.type)) {
      alert("Please select a valid image."); 
      return;
    }
    
    fileReader.readAsDataURL(uploadFile);
  }


  // remove About 
function removeAbout(aboutId = null) {
	if(aboutId) {
		// remove about button clicked
		jQuery(function(){
      $("#removeAboutBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeAboutBtn").button('loading');
			$.post('./php_action/removeAbout.php',
				{aboutId: aboutId},
				function(response) {
					// loading remove button
					$("#removeAboutBtn").button('reset');
					if(response.success == true) {
						// remove about modal
						$("#removeAboutModal").modal('hide');

						// update the about table
						aboutTable.ajax.reload(null, false);

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
			); // /ajax fucntion to remove the about
			return false;
      }); // /remove  btn clicked
    });
	} // /if aboutid
} // /remove about function

  