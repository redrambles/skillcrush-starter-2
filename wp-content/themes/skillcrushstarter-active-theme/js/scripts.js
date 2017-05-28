// To expand the search box on focus in small screens
jQuery(document).ready(function($) {
    $('input.search-box-text').click(function () {
    $('.search-box-text').toggleClass('expanded');
    $('.input-btn').toggleClass('expanded');
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
  };
  addEmoji();


  // Say Hello
  console.log('Hiya, Gorgeous. Thanks for dropping by! xxx');