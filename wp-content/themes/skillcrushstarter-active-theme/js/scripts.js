// To expand the search box on focus in small screens
jQuery(document).ready(function($) {
    $('input.search-box-text').click(function () {
    $('.search-box-text').toggleClass('expanded');
    $('.input-btn').toggleClass('expanded');
  });
});

// Smooth Scroll
jQuery(document).ready(function($) {
  $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if(target.length) {
      event.preventDefault();
      $('html, body').stop().animate({
        scrollTop: (target.offset().top - 50)
      }, 1000);
    }
  });
});

// Bill Murray page
	(function ( $ ) {
		$( function () {
			var $videoContainers = $( '.video-container' );

			$videoContainers.on( 'click', '.video-play', function ( e ) {
				var $this = $( this ),
					$videoContainer = $this.parents( '.video-container' ),
					videoInfo = $videoContainer.data( 'video' );

				if ( videoInfo ) {
					$videoContainer.html( videoInfo );
				}

			} );
		} );
	})( jQuery );


  // emoji
  function addEmoji() {
    if (navigator.userAgent.indexOf('Mac OS X') != -1) {
      window.location.hash = "🍷";
    }
  }
  addEmoji();


  // Say Hello
  console.log('Hiya, Gorgeous. Thanks for dropping by! xxx');

  // Sidebar Filter 
  jQuery(function($){
    $('#filter').submit(function(){
        var filter = $('#filter');
        $.ajax({
            url:filter.attr('action'),
            data:filter.serialize(), // form data - will be output in '#response' div
            type:filter.attr('method'), // POST
            beforeSend:function(xhr){
                filter.find('button').text('Applying Filters...');          
            },
            success:function(data){
                filter.find('button').text('Apply filters');                
                $('#response').html(data);

            }
        });
        return false;
    });
});
