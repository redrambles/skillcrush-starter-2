<?php
function skillcrushstarter_customize_register( $wp_customize ) {
	
	/* Sections */

	// footer details section
	$wp_customize->add_section( 'skillcrushstarter_footer' , array(
		'title' => __( 'Footer Details', 'skillcrushstarter')
	) );
	
	/* Define generic controls */
	
	// create class to define textarea controls in Customizer
	class skillcrushstarter_Customize_Textarea_Control_Footer extends WP_Customize_Control {
		
		public $type = 'textarea';
		public function render_content() {
			
			echo '<label>';
				echo '<span class="customize-control-title">' . esc_html( $this-> label ) . '</span>';
				echo '<textarea rows="6" style ="width: 100%;"';
				$this->link();
				echo '>' . esc_textarea( $this->value() ) . '</textarea>';
			echo '</label>';
			
		}
	}	
	
	/* Contact details in footer */

	// footer message
	$wp_customize->add_setting( 'skillcrushstarter_footer_message', array (
		'default' => __( 'Your footer message', 'skillcrushstarter' )
	) );
	$wp_customize->add_control( new skillcrushstarter_Customize_Textarea_Control_Footer(
		$wp_customize,
		'skillcrushstarter_footer_message',
		array( 
			'label' => __( 'Footer Message', 'skillcrushstarter' ),
			'section' => 'skillcrushstarter_footer',
			'settings' => 'skillcrushstarter_footer_message'
	)));
	
}
add_action( 'customize_register', 'skillcrushstarter_customize_register' );

/* Add to theme */

// Give option to display custom footer details - called in footer.php
function skillcrushstarter_display_footer_details() { 
	echo '<p class="get-in-touch">' .get_theme_mod( 'skillcrushstarter_footer_message', 'Your footer message' ) . '</p>';
}
add_action( 'skillcrushstarter_footer_customizer', 'skillcrushstarter_display_footer_details' );
