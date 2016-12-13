// To hide and then show gists that have been embedded

jQuery(document).ready(function($) {
// This solution is compliant with progressive enhancement principles - as the content will still show if JS is disabled.
	$(".snippet").hide();
  
	$(".code-button").on('click', function(){
		$(this).siblings(".snippet").slideToggle();
	});

});