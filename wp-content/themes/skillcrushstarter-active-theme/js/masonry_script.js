(function($) {

  $(window).load(function() {
  //console.log("hello");
    var container = document.querySelector('#ms-container');
    var msnry = new Masonry( container, {
      itemSelector: '.ms-item',
      columnWidth: '.ms-item',                
    });  
    
  });

})( jQuery );