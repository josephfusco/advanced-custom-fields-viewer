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
	register_setting( 'acfv-settings-group', 'acfv_option_output' );
	register_setting( 'acfv-settings-group', 'acfv_option_color_scheme' );
}

function acfv_settings_page() {
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Advanced Custom Fields Viewer Options</h2>
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
                                    <td>
                                        <?php
                                        $defaults = array( 'option_1' => 'print_r' );
                                        $options = get_option( 'acfv_option_output', $defaults );
                                        ?>
                                        <fieldset>
                                            <h2 style="padding-left:0;">Output</h2>
                                            <div>
                                            	<label for="option_print_r">
                                            		<input id="option_print_r" type="radio" name="acfv_option_output[option_1]" value="print_r"<?php checked( 'print_r' == $options['option_1'] ); ?> />
                                            		<span>print_r</span>
                                            	</label>
                                            </div>
                                            <div>
                                                <label for="option_var_dump">
                                            		<input id="option_var_dump" type="radio" name="acfv_option_output[option_1]" value="var_dump"<?php checked( 'var_dump' == $options['option_1'] ); ?> />
                                            		<span>var_dump</span>
                                            	</label>
                                            </div>
                                        </fieldset>
		                            </td>
						        </tr>
						        <tr valign="top">
                                    <td>
        						        <?php
        						        $defaults = array( 'option_2' => 'dark'	);
        						        $options = get_option( 'acfv_option_color_scheme', $defaults );
        						        ?>
                                        <fieldset>
                                            <h2 style="padding-left:0;">Viewer Color Scheme</h2>
                                            <div>
                                                <label for="option_dark">
                                                    <input id="option_dark" type="radio" name="acfv_option_color_scheme[option_2]" value="dark"<?php checked( 'dark' == $options['option_2'] ); ?> />
                                                    <span>Dark</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label for="option_light">
                                                    <input id="option_light" type="radio" name="acfv_option_color_scheme[option_2]" value="light"<?php checked( 'light' == $options['option_2'] ); ?> />
                                                    <span>Light</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label for="option_transparent">
                                                    <input id="option_transparent" type="radio" name="acfv_option_color_scheme[option_2]" value="transparent"<?php checked( 'transparent' == $options['option_2'] ); ?> />
                                                    <span>Transparent</span>
                                                </label>
                                            </div>
                                        </fieldset>
                                    </td>
						        </tr>
						    </table>
						</div>
						<?php submit_button(); ?>
					</div>
				</form>

                <h3>Keyboard Shortcuts</h3>
                <p>Toggle Viewer: <code>shift</code> + <code>v</code></p>
                <p>Close Viewer: <code>esc</code></p>

			</div>
		</div>
		<br class="clear">
	</div>
</div>
<?php }

register_deactivation_hook( __FILE__, 'acfv_deactivation' );
function acfv_deactivation() {
    delete_option( 'acfv_option_output' );
    delete_option( 'acfv_option_color_scheme' );
}
