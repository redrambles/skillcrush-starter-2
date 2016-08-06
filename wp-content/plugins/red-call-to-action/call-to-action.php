<?php 
/**
 * Plugin Name:   Red Call to Action Shortcode
 * Description:   Adds a shortcode for a call to action box
 * Version:       1.0
 *
 */
 
// Let's pull in the css 
function red_shortcode_enqueue_styles() {
	
	wp_register_style( 'shortcode_cta_css', plugins_url( 'css/style.css', __FILE__ ) );
  wp_enqueue_style( 'shortcode_cta_css' );
 
}
add_action( 'wp_enqueue_scripts', 'red_shortcode_enqueue_styles' );


// Let's test a shortcode_cta_css
// Usage - [cta-simple tel="555-555-5555" email="youremail@email.com"]
function red_cta_simple( $atts, $content = null ) {
	
	$atts = shortcode_atts( array(
		'tel' => '555-5555', //default value
		'email' => 'email@email.com'
	), $atts, 'cta-simple' );
	
	ob_start(); 
	?>	
	
	<div class="shortcode cta">
		
		<?php echo 'Call us at ' . $atts['tel'] . ' or email <a href="mailto:' . $atts['email'] . '">' . $atts['email'] . '</a>'; ?>
		
	</div>	
	
	<?php 
	return ob_get_clean();	

}
add_shortcode( 'cta-simple', 'red_cta_simple' );