/* To use with Slick Slider 
	Documentation here: http://kenwheeler.github.io/slick/
*/
jQuery(document).ready(function($){
	// $('.slick-slider').slick({
  //   infitine: true,
	// 	autoplay: true,
	// 	fade: false, // true will create a fade into the next image - false will slide 
	// 	speed: 1500,
	// 	autoplaySpeed: 5000,
	// 	prevArrow: '<p class="one-half first left-arrow">&#8249;</p>',
	// 	nextArrow: '<p class="one-half right-arrow">&#8250;</p>'
	// });
	$('.slick-slider').slick({ //This would be a great idea for a 'scroll' of blog posts - each image linking to the single blog page
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
});
			
});
