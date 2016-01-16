<h1>Skillcrushstarter Theme Options</h1>
<?php settings_errors(); ?>

<div class="skillcrushstarter-sidebar-preview">
	<div class="skilcrushstarter-sidebar">
		<h1 class="skillcrushstarter-username"></h1>
		<h2 class="skillcrushstarter-description"></h2>
		<div class="icons-wrapper"></div>
	</div>
</div>

<form method="post" action="options.php">
	<?php settings_fields( 'skillcrushstarter-settings-group' ); ?>
	<?php do_settings_sections( 'skillcrushstarter_options' ); ?>
	<?php submit_button();?>
</form>
