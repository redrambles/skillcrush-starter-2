<h1>Skillcrushstarter Theme Options</h1>

<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'skillcrushstarter-settings-group' ); ?>
	<?php do_settings_sections( 'skillcrushstarter_options' ); ?>
	<?php submit_button();?>
</form>