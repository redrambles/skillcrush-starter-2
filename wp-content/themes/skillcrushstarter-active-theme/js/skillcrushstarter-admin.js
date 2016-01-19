jQuery(document).ready(function($) {

  var mediaUploader;

  $( '#upload-button' ).click( function(e) ){
      e.preventDefault();
      if( mediaUploader ){
        mediaUploader.open();
        return
      }

  });


});
