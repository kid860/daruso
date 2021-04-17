
var sliderTable;

$(document).ready(function(){
    'use strict'
    feather.replace();

    $('#navHome').addClass('active');

    $('#summer').summernote({
        placeholder: 'This is a placeholder',
        tabsize: 2,
        height: 130
    });

    // Form validation and submission for the slider items
    sliderTable = $('#sliderTable').DataTable({
      'ajax': './php_action/fetchSliderItems.php',
      'order': []
    });

    $("#uploadSlider").unbind('submit').bind('submit', function(e) {
      e.preventDefault();					
      // form validation
      var uploadImage = document.getElementById("upload-Image").files[0];
      var heading = $("#heading").val();			
      var link = $("#link").val();				
      var sub_heading = $(".note-editor.note-frame.panel.panel-default .note-editable p").text();				
      
      if(heading == "") {
        $("#heading").closest('.center-block').after('<p class="text-danger">Heading field is required</p>');
        $('#heading').closest('.form-group').addClass('has-error');
      }	else {
        // remove error text field
        $("#heading").find('.text-danger').remove();
        // success out for form 
        $("#heading").closest('.form-group').addClass('has-success');	  	
      }	// /else

      
      if(sub_heading == "") {
        $("#summer").closest('.center-block').after('<p class="text-danger">Heading field is required</p>');
        $('#summer').closest('.form-group').addClass('has-error');
      }	else {
        // remove error text field
        $("#summer").find('.text-danger').remove();
        // success out for form 
        $("#summer").closest('.form-group').addClass('has-success');	  	
      }	

      if(heading && sub_heading && uploadImage) {

        var form = $(this);
        var formData = new FormData(this);
        formData.append("sub_heading", sub_heading);

        $.ajax({
          url : form.attr('action'),
          type: form.attr('method'),
          data: formData,
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          success:function(response) {
            console.log(response)
            if(response.success == true) {
              // submit loading button
              $("#editProductImageBtn").button('reset');																		

              $("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
                                  
              // shows a successful message after operation
              $('#uploadSliderMsg').html('<div class="alert alert-success">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong><i class="fa fa-check"></i></strong> '+ response.messages +
              '</div>');

              // remove the mesages
              $(".alert-success").delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              }); // /.alert

              // reload the slider item table
              sliderTable.ajax.reload(null, true);																	

              // remove text-error 
              $(".text-danger").remove();
              // remove from-group error
              $(".form-group").removeClass('has-error').removeClass('has-success');
              $("#uploadSlider").reset();
              sub_heading.html("");

            } // /if response.success
            
          } // /success function
        }); // /ajax function
      }	 // /if validation is ok 					

      return false;
    }); // /update the product image

    // Add Toggle
    $("#addToggle").click(function(){
      $(".addSlider").toggle(300);
    });
});

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


  // remove Slider 
function removeSlider(sliderId = null) {
	if(sliderId) {
		// remove product button clicked
		jQuery(function(){
      var sliderTable = $('#sliderTable');
      $("#removeSliderBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeSliderBtn").button('loading');
			$.post('./php_action/removeSlider.php',
				{sliderId: sliderId},
				function(response) {
          console.log(response);
					// loading remove button
					$("#removeSliderBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeSliderModel").hide(200);

            // update the product table
						sliderTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="fa fa-check"></i></strong>Succesfully Removed</div>');

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
							'<strong><i class="fa fa-check"></i></strong>Succesfully Removed</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

          } // /error
          location.reload();
				} // /success function
			); // /ajax fucntion to remove the product
			return false;
      }); // /remove product btn clicked
    });
	} // /if productid
} // /remove product function

  