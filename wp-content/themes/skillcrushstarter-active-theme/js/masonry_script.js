(function($) {

  $(window).load(function() {
  console.log("hello");
    // MASSONRY Without jquery
    var container = document.querySelector('#ms-container');
    var msnry = new Masonry( container, {
      itemSelector: '.ms-item',
      columnWidth: '.ms-item',                
    });  
    
  });

})( jQuery );