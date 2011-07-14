<?php
$theme_name = 'focus';

	add_action('admin_init', 'focus_options_init');
	add_action('admin_menu', 'focus_options_add_page');
	
if (isset($_GET['page']) && $_GET['page'] == 'theme_options') {
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
}

/**
 * Init plugin options to white list our options
 */
function focus_options_init(){
	register_setting( 'focus_options', 'focus_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function focus_options_add_page() {
	add_theme_page( __( 'Focus Options', $theme_name ), __( 'Focus Options', $theme_name ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our options
 */

$select_options = array();

$logo_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', $theme_name )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', $theme_name )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $logo_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Options', $theme_name ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', $theme_name ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'focus_options' ); ?>
			<?php $options = get_option( 'focus_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A 
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Graphic logo', $theme_name ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Graphic logo', $theme_name ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $logo_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="focus_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
				 
				<tr valign="top">
					<th scope="row">Upload Image</th>
					<td><label for="upload_image">
					<input id="upload_image" type="text" size="36" name="upload_image" value="<?php esc_attr_e( $options['logo_url'] ); ?>" />
					<input id="upload_image_button" type="button" value="Upload Image" />
					<input type="hidden" name="focus_theme_options[logo_url]" id="logo_url" value="<?php esc_attr_e( $options['logo_url'] ); ?>" /> 
					<br />Enter an URL or upload an image for the logo.
					</label></td>
				</tr>
				 
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', $theme_name ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $logo_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['logo_url'] = wp_filter_nohtml_kses( $input['logo_url'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $logo_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

function my_admin_scripts() {
	$theme_root = get_theme_root();
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', '/wp-content/themes/focus/js/focus-script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}




