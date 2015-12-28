<?php


function acfv_create_menu() {

	// create settings menu
	add_options_page(
		'Advanced Custom Fields Viewer',
		'ACF Viewer',
		'manage_options',
		__FILE__,
		'acfv_settings_page'
	);

	// call register settings function
	add_action( 'admin_init', 'register_acfv_settings' );
}
add_action('admin_menu', 'acfv_create_menu');


function register_acfv_settings() {

	// register our settings
	register_setting( 'acfv-settings-group', 'option_output' );
	register_setting( 'acfv-settings-group', 'option_color_scheme' );

}


function acfv_settings_page() {
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Advanced Custom Fields Viewer Settings</h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="post-body-content">
				<form method="post" action="options.php">
					<div class="meta-box-sortables ui-sortable">
						<div class="inside">
							<?php settings_fields( 'acfv-settings-group' ); ?>
	    					<?php do_settings_sections( 'acfv-settings-group' ); ?>
	    					<table class="form-table">
						        <tr valign="top">
						        <th scope="row"><h3><span>Output</span></h3></th>
						        <?php

						        $defaults = array( 'option_1' => 'print_r' );
								$options = get_option( 'option_output', $defaults );

								?>
								<td>
									<p>
										<input id="option_print_r" type="radio" name="option_output[option_1]" value="print_r"<?php checked( 'print_r' == $options['option_1'] ); ?> />
										<label for="option_print_r">print_r</label>
									</p>
									<p>
										<input id="option_var_dump" type="radio" name="option_output[option_1]" value="var_dump"<?php checked( 'var_dump' == $options['option_1'] ); ?> />
										<label for="option_var_dump">var_dump</label>
									</p>
								</td>
						        </tr>
						        <tr valign="top">
						        <th scope="row"><h3><span>Color Scheme</span></h3></th>
						         <?php

						        $defaults = array( 'option_2' => 'dark'	);
						        $options = get_option( 'option_color_scheme', $defaults );

						        ?>
						        <td>
						        	<p>
										<input id="option_dark" type="radio" name="option_color_scheme[option_2]" value="dark"<?php checked( 'dark' == $options['option_2'] ); ?> />
										<label for="option_dark">Dark</label>
									</p>
						        	<p>
										<input id="option_light" type="radio" name="option_color_scheme[option_2]" value="light"<?php checked( 'light' == $options['option_2'] ); ?> />
										<label for="option_light">Light</label>
									</p>
									<p>
										<input id="option_transparent" type="radio" name="option_color_scheme[option_2]" value="transparent"<?php checked( 'transparent' == $options['option_2'] ); ?> />
										<label for="option_transparent">Transparent</label>
									</p>
								</td>
						        </tr>
						    </table>
						</div>
						<?php submit_button(); ?>
					</div>
				</form>
			</div>
		</div>
		<br class="clear">
	</div>
</div>
<?php }
