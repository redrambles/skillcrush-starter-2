<?php
/**
* Plugin Name:   Red Call to Action Widget
* Description:   Adds a widget for a call to action box
* Version:       1.0
* Author:        Ann Cascarano
*/

//Pull in our CSS
function red_widget_enqueue_styles() {
	
	wp_register_style( 'widget_red_cta_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'widget_red_cta_css' );
 
}
add_action( 'wp_enqueue_scripts', 'red_widget_enqueue_styles' );
 
// Widget Stuffs
class Red_Cta_Widget extends WP_Widget {
	//constructor function
	function __construct() {
		$widget_options = array(
			'classname' => 'red_cta_widget',
			'description' => 'Let folks know how to get in touch.'
		);
		parent::__construct( 'red_cta_widget', 'Call to Action', $widget_options );
	}
 
	//function to define the form in the Widgets screen
	function form( $instance ) { 
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$tel = ! empty( $instance['tel'] ) ? $instance['tel'] : 'Phone #';
		$email = ! empty( $instance['email'] ) ? $instance['email'] : 'Email';
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input class="widefat" type ="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tel' ); ?>">Your phone number:</label>
			<input class="widefat" rows="10" type="text" id="<?php echo $this->get_field_id( 'tel' ); ?>" name="<?php echo $this->get_field_name( 'tel' ); ?>" value="<?php echo esc_attr( $tel ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>">Your email:</label>
			<input class="widefat" rows="10" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $email ); ?>" />
		</p>
	
	<?php }

 	//function to define the data saved by the widget
	function update( $new_instance, $old_instance ) { 
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'tel' ] = strip_tags( $new_instance[ 'tel' ] );
		$instance[ 'email' ] = strip_tags( $new_instance[ 'email' ] );
		return $instance;
	}

 	//function to display the widget in the site
	function widget( $args, $instance ) {
		//echo $args ['before_widget'];
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$tel = $instance['tel'];
		$email = $instance['email'];
	?>
		<div class="cta">
			<?php if ( ! empty( $title ) ) {
				//echo $before_title . $title . $after_title; 
        echo $title;
			}; ?>
		<?php echo '<p> Call ' .  $tel . ' or email <a href="' . $email . '">' . $email . '</a></p>'; ?>
	</div>
		
		<?php //echo $args['after_widget'];
	
	}

}

//function to register the widget
function red_register_widget() { 
	register_widget( 'Red_Cta_Widget' );
}
add_action( 'widgets_init', 'red_register_widget' );