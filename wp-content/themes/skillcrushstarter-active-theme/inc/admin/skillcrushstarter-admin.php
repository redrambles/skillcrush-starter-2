<?php
/*
*
* Generates our Option page. Called at the bottom of admin-functions.php
*
*/
?>

<h1 class="main-options-title">Skillcrushstarter Theme Options</h1>
<?php settings_errors(); ?>
<?php
	$picture = esc_attr( get_option( 'profile_pic' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'user_description' ) );
 ?>
<div class="skillcrushstarter-main-options-page">
	<div class="skillcrushstarter-sidebar-preview">
		<div class="skilcrushstarter-sidebar">
			<div class="image-container">
				<div class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
			</div>
			<h1 class="skillcrushstarter-username"><?php echo $fullName; ?></h1>
			<h2 class="skillcrushstarter-description"><?php echo $description; ?></h2>
			<div class="icons-wrapper"></div>
		</div>
	</div>

	<form method="post" action="options.php" class="skillcrushstarter-general-form">
		<?php settings_fields( 'skillcrushstarter-settings-group' ); ?>
		<?php do_settings_sections( 'skillcrushstarter_options' ); ?>
		<?php submit_button();?>
	</form>
</div>
