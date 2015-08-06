<?php


function acfv_create_menu() {

	// create new top-level menu
	add_menu_page(
		'Advanced Custom Fields Viewer',
		'Viewer',
		'manage_options',
		__FILE__,
		'acfv_settings_page',
		plugins_url( '/logo.svg' , __FILE__ ), 89
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
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox">
						<a class="acfv-author" href="http://josephfus.co" target="_blank">
							<svg class="acfv__logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 620 620" enable-background="new 0 0 620 620" xml:space="preserve">
								<path class="logo__j logo__path" fill="#D2D7D3" d="M244.862,99.959h4.439l8.879,8.655l-2.22,72.125v83.666l8.879,164.444h2.219l-2.219,2.886v20.195
									c-3.455,50.006-15.292,75.01-35.515,75.01c-36.993,0-87.304-31.735-150.933-95.205l-2.22-2.886
									c3.847-12.309,7.547-19.04,11.098-20.195h4.439c18.053,33.468,43.948,59.432,77.687,77.896
									c9.271,5.771,28.507,11.54,57.708,17.31c11.838-6.409,17.757-18.911,17.757-37.505v-25.965l-8.878-250.995
									C235.984,129.771,238.943,99.959,244.862,99.959z"></path>
								<path class="logo__f logo__path" fill="#D2D7D3" d="M452.536,113.34c20.594,2.896,30.882,6.778,30.864,11.647c-0.036,9.999-2.865,15.757-8.49,17.274
									l-19.647-5.84c-71.174-0.257-106.808,12.111-106.898,37.107c-7.64,40.479-11.541,83.725-11.708,129.742l2.8,2.895l2.81,0.01
									c70.744-18.97,119.478-28.408,146.199-28.312c20.592,3.535,30.876,8.379,30.854,14.532l-0.022,5.768l-8.458,8.623l-16.836-5.83
									c-40.584-0.147-93.069,10.239-157.449,31.155c3.028,94.354-1.814,138.558-14.529,132.617l-8.429-0.031l0.418-115.363
									l-2.779-8.662l-5.619-0.021l-16.867,2.823c-7.48-2.974-11.216-5.872-11.206-8.693l0.021-5.768
									c0.016-4.614,11.274-10.342,33.776-17.182l2.819-2.873l0.095-25.957l11.665-118.206c-11.987-0.044-18.532-2.951-19.634-8.723
									l0.03-8.652C306.354,137.295,355.093,125.935,452.536,113.34z"></path>
							</svg>
							<div class="inside">
								Created by Joseph Fusco
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<br class="clear">
	</div>
</div>
<?php } 

function acfv_backend_styles() {
	wp_enqueue_style( 'acfv_backend_css', plugins_url( '/acfv-admin.css' , __FILE__ ) );
}
add_action( 'admin_head', 'acfv_backend_styles' );