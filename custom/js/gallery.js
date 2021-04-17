
var galleryTable;
$(document).ready(function(){
    'use strict'
    feather.replace();

    $('#navGallery').addClass('active');
    $('#navGallery').siblings().removeClass('active');

    // Form validation and submission for the gallery items
    galleryTable = $('#galleryTable').DataTable({
        'ajax': './php_action/fetchGallery.php',
        'order': []
    });

    // preventing page from redirecting
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("span").text("Drag here");4
    });

    $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

    // Dropzone

    // Cabinet
    // Drag enter
    $('.gallery-cabinet .dropzone').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".gallery-cabinet span").text("Drop");
    });

    // Drag over
    $('.gallery-cabinet .dropzone').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".gallery-cabinet span").text("Drop");
    });

    // Drop
    $('.gallery-cabinet .dropzone').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $(".gallery-cabinet span").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        
        $(".gallery-cabinet .gallery-detail").show(function () {
            $(".gallery-cabinet .gallery-detail #submitGallery").click( function () {
                var date = $(".gallery-cabinet .gallery-detail .galleryDate").val();
                var caption = $(".gallery-cabinet .gallery-detail .galleryCaption").val();

                if(date && caption){
                    var fd = new FormData();
                    fd.append('file', file[0]);

                    fd.append('govt', "cabinet");
                    fd.append('date', date);
                    fd.append('caption', caption);

                    uploadData(fd);

                    $(".gallery-cabinet span").text("Uploaded!!");
                    $(".gallery-cabinet .gallery-detail").hide();
                }

                else{
                    alert("Please Insert values in all the fields");
                }
                
            });
        });
    });


    // Judicial
    // Drag enter
    $('.gallery-judicial .dropzone').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".gallery-judicial span").text("Drop");
    });

    // Drag over
    $('.gallery-judicial .dropzone').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".gallery-judicial span").text("Drop");
    });

    // Drop
    $('.gallery-judicial .dropzone').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $(".gallery-judicial span").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        
        $(".gallery-judicial .gallery-detail").show(function () {
            $(".gallery-judicial .gallery-detail #submitGallery").click( function () {
                var date = $(".gallery-judicial .gallery-detail .galleryDate").val();
                var caption = $(".gallery-judicial .gallery-detail .galleryCaption").val();

                if(date && caption){
                    var fd = new FormData();
                    fd.append('file', file[0]);

                    fd.append('govt', "judicial");
                    fd.append('date', date);
                    fd.append('caption', caption);

                    uploadData(fd);

                    $(".gallery-judicial span").text("Uploaded!!");
                    $(".gallery-judicial .gallery-detail").hide();
                }

                else{
                    alert("Please Insert values in all the fields");
                }
                
            });
        });
    });


    // USCR
    // Drag enter
    $('.gallery-uscr .dropzone').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".gallery-uscr span").text("Drop");
    });

    // Drag over
    $('.gallery-uscr .dropzone').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".gallery-uscr span").text("Drop");
    });

    // Drop
    $('.gallery-uscr .dropzone').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $(".gallery-uscr span").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        
        $(".gallery-uscr .gallery-detail").show(function () {
            $(".gallery-uscr .gallery-detail #submitGallery").click( function () {
                
                var date = $(".gallery-uscr .gallery-detail .galleryDate").val();
                var caption = $(".gallery-uscr .gallery-detail .galleryCaption").val();

                if(date && caption){
                    var fd = new FormData();
                    fd.append('file', file[0]);

                    fd.append('govt', "uscr");
                    fd.append('date', date);
                    fd.append('caption', caption);

                    uploadData(fd);

                    $(".gallery-uscr span").text("Uploaded!!");
                    $(".gallery-uscr .gallery-detail").hide();
                }

                else{
                    alert("Please Insert values in all the fields");
                }
                
            });
        });
    });
});//document



// Sending AJAX request and upload file
function uploadData(formdata){

    $.ajax({
        url: './php_action/addGallery.php',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            galleryTable.ajax.reload(null, false);
        }
    });
    location.reload();
}

// remove gallery 
function removeGallery(galleryId = null) {
if(galleryId) {
    // remove gallery button clicked
    jQuery(function(){
    $("#removeGalleryBtn").unbind('click').bind('click', function() {
        // loading remove button
        $("#removeGalleryBtn").button('loading');
        $.post('./php_action/removeGallery.php',
            {galleryId: galleryId},
            function(response) {
                // loading remove button
                $("#removeGalleryBtn").button('reset');
                if(response.success == true) {
                    // remove Gallery modal
                    $("#removeGalleryModal").modal('hide');

                    // update the Gallery table
                    galleryTable.ajax.reload(null, false);

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
    ); // /ajax fucntion to remove the gallery
    return false;
    }); // /remove  btn clicked
});
} // /if galleryid
} // /remove gallery function


  