
var leaderTable;
$(document).ready(function(){
    'use strict'
    feather.replace();

    $('#navLeaders').addClass('active');
    $('#navLeaders').siblings().removeClass('active');

    // Form validation and submission for the leader items
    leaderTable = $('#leaderTable').DataTable({
        'ajax': './php_action/fetchLeaders.php',
        'order': []
    });

    // preventing page from redirecting
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("span").text("Drag here");
    });

    $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

    // Leaders Data
    $.get("./php_action/fetchLeaders.php",
    function (data) {
        var _data = JSON.parse(data);
        _data.data.forEach(element => {
            var div = element[6];
            var govt = element[7];

            if(div != "" && govt == "cabinet"){
                $(".leaders-cabinet .div"+div).remove();
            }
            if(div != "" && govt == "judicial"){
                $(".leaders-judicial .div"+div).remove();
            }
            if(div != "" && govt == "uscr"){
                $(".leaders-uscr .div"+div).remove();
            }
        });   
    }
    );
    
    // Dropzone
    

    // Cabinet
    // Drag enter
    $('.leaders-cabinet .dropzone').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("span").text("Drop");
    });

    // Drag over
    $('.leaders-cabinet .dropzone').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("span").text("Drop");
    });

    // Drop
    $('.leaders-cabinet .dropzone').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $("span").text("Upload");
        var div_value = $(".leaders-cabinet .divValue").val();

        var file = e.originalEvent.dataTransfer.files;
        
        $(".leaders-cabinet .leader-detail"+div_value).show(function () {
            $(".leaders-cabinet .leader-detail"+div_value+" #submitLeader").click( function () {
                var firstname = $(".leaders-cabinet .leader-detail"+div_value+" .leaderFirst").val();
                var secondname = $(".leaders-cabinet .leader-detail"+div_value+" .leaderSecond").val();
                var position = $(".leaders-cabinet .leader-detail"+div_value+" .leaderPosition").val();
                var year = $(".leaders-cabinet .leader-detail"+div_value+" .leaderYear").val();

                if(firstname && secondname && position && year ){
                    var fd = new FormData();
                    fd.append('file', file[0]);

                    fd.append('value', div_value);
                    fd.append('govt', "cabinet");
                    fd.append('firstname', firstname);
                    fd.append('secondname', secondname);
                    fd.append('position', position);
                    fd.append('year', year);

                    uploadData(fd, div_value);

                    $(".leaders-cabinet .leader-detail"+div_value).hide();
                }

                else{
                    alert("Please Insert values in all the fields");
                }
                
            });
        });
    });


    // Judicial
    // Drag enter
    $('.leaders-judicial .dropzone').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("span").text("Drop");
    });

    // Drag over
    $('.leaders-judicial .dropzone').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("span").text("Drop");
    });

    // Drop
    $('.leaders-judicial .dropzone').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $("span").text("Upload");
        var div_value = $(".leaders-judicial .divValue").val();

        var file = e.originalEvent.dataTransfer.files;
        
        $(".leaders-judicial .leader-detail"+div_value).show(function () {
            $(".leaders-judicial .leader-detail"+div_value+" #submitLeader").click( function () {
                var firstname = $(".leaders-judicial .leader-detail"+div_value+" .leaderFirst").val();
                var secondname = $(".leaders-judicial .leader-detail"+div_value+" .leaderSecond").val();
                var position = $(".leaders-judicial .leader-detail"+div_value+" .leaderPosition").val();
                var year = $(".leaders-judicial .leader-detail"+div_value+" .leaderYear").val();

                if(firstname && secondname && position && year ){
                    var fd = new FormData();
                    fd.append('file', file[0]);

                    fd.append('value', div_value);
                    fd.append('govt', "judicial");
                    fd.append('firstname', firstname);
                    fd.append('secondname', secondname);
                    fd.append('position', position);
                    fd.append('year', year);

                    uploadData1(fd, div_value);

                    $(".leaders-judicial .leader-detail"+div_value).hide();
                }

                else{
                    alert("Please Insert values in all the fields");
                }
                
            });
        });
    });


    // USCR
    // Drag enter
    $('.leaders-uscr .dropzone').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("span").text("Drop");
    });

    // Drag over
    $('.leaders-uscr .dropzone').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("span").text("Drop");
    });

    // Drop
    $('.leaders-uscr .dropzone').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $("span").text("Upload");
        var div_value = $(".leaders-uscr .divValue").val();

        var file = e.originalEvent.dataTransfer.files;
        
        $(".leaders-uscr .leader-detail"+div_value).show(function () {
            $(".leaders-uscr .leader-detail"+div_value+" #submitLeader").click( function () {
                var firstname = $(".leaders-uscr .leader-detail"+div_value+" .leaderFirst").val();
                var secondname = $(".leaders-uscr .leader-detail"+div_value+" .leaderSecond").val();
                var position = $(".leaders-uscr .leader-detail"+div_value+" .leaderPosition").val();
                var year = $(".leaders-uscr .leader-detail"+div_value+" .leaderYear").val();

                if(firstname && secondname && position && year ){
                    var fd = new FormData();
                    fd.append('file', file[0]);

                    fd.append('value', div_value);
                    fd.append('govt', "uscr");
                    fd.append('firstname', firstname);
                    fd.append('secondname', secondname);
                    fd.append('position', position);
                    fd.append('year', year);

                    uploadData2(fd, div_value);

                    $(".leaders-uscr .leader-detail"+div_value).hide();
                }

                else{
                    alert("Please Insert values in all the fields");
                }
                
            });
        });
    });
});//document



// Sending AJAX request and upload file
function uploadData(formdata, num){

    $.ajax({
        url: 'upload.php',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            leaderTable.ajax.reload(null, false);
            addThumbnail(response, num);
        }
    });
}

// Added thumbnail
function addThumbnail(data, num){
    $(".leaders-cabinet .div"+num+" span").remove(); 
    var name = data.name;
    var size = parseInt(data.size);
    var src = data.src;
    var msg = data.message;

    // Creating an thumbnail
    $(".leaders-cabinet .div"+num).html('<img src="'+src+'" width="100%" height="100%">');
    $(".leader-messages").html('<div class="alert alert-success">'+
        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong><i class="fa fa-check"></i></strong>'+msg+'</div>');
              

}

// Sending AJAX request and upload file
function uploadData1(formdata, num){

    $.ajax({
        url: 'upload.php',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            leaderTable.ajax.reload(null, false);
            addThumbnail1(response, num);
        }
    });
}

// Added thumbnail
function addThumbnail1(data, num){
    $(".leaders-judicial .div"+num+" span").remove(); 
    var name = data.name;
    var size = parseInt(data.size);
    var src = data.src;
    var msg = data.message;

    // Creating an thumbnail
    $(".leaders-judicial .div"+num).html('<img src="'+src+'" width="100%" height="100%">');
    $(".leader-messages").html('<div class="alert alert-success">'+
        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong><i class="fa fa-check"></i></strong>'+msg+'</div>');
              

}

// Sending AJAX request and upload file
function uploadData2(formdata, num){

    $.ajax({
        url: 'upload.php',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            leaderTable.ajax.reload(null, false);
            addThumbnail2(response, num);
        }
    });
}

// Added thumbnail
function addThumbnail2(data, num){
    $(".leaders-uscr .div"+num+" span").remove(); 
    var name = data.name;
    var size = parseInt(data.size);
    var src = data.src;
    var msg = data.message;

    // Creating an thumbnail
    $(".leaders-uscr .div"+num).html('<img src="'+src+'" width="100%" height="100%">');
    $(".leader-messages").html('<div class="alert alert-success">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong><i class="fa fa-check"></i></strong>'+msg+'</div>');

}

  // remove leader 
  function removeLeader(leaderId = null) {
	if(leaderId) {
		// remove leader button clicked
		jQuery(function(){
        $("#removeLeaderBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeLeaderBtn").button('loading');
			$.post('./php_action/removeLeaders.php',
				{leaderId: leaderId},
				function(response) {
					// loading remove button
					$("#removeLeaderBtn").button('reset');
					if(response.success == true) {
						// remove Leader modal
						$("#removeLeaderModal").modal('hide');

						// update the Leader table
						leaderTable.ajax.reload(null, false);

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
        ); // /ajax fucntion to remove the leader
        return false;
      }); // /remove  btn clicked
    });
	} // /if leaderid
} // /remove leader function


  