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
