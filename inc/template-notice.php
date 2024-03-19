<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Starter Template Setup Notice
 */
function hotelic_starter_template_activation_admin_notice() {
	$hotelic_get_current_screen = get_current_screen();
	if( $hotelic_get_current_screen->base == 'update' ){ 
		return;
	}
    if(is_admin()) { ?>
		<div class="hotelic-notice notice notice-info is-dismissible">
			<div class="hotelic-notice-pattern-image" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/assets/admin/img/hotelic-patern.png'); ?>);"></div>
			<div class="hotelic-notice-container">
				<div class="hotelic-notice-content">
					<h5>
						<?php _e("Thank you for installing Hotelic theme 👌","hotelic"); ?>
					</h5>
					<h2>
						<?php _e("Empowering Your WordPress With Ready-Made Templates","hotelic"); ?>
					</h2>
					<p>
						<?php _e("Creating a website can be effortless. With <strong style='font-weight: 700'>hotelic's Toolkit</strong> , you can swiftly import pre-designed layouts and commence building your ideal website within minutes.", "hotelic"); ?>
					</p>
					<div class="button-box-showdaw">
						<button class="btn btn-primary hotelic-toolkit-installation" data-plugin-slug="travelfic-toolkit">
							<?php _e("Install & View Demo", "hotelic"); ?>
							
							<svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="content">
							<path id="Vector" d="M16 6.49963L1 6.49963" stroke="#292E32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path id="Vector 6907" d="M12 1.49976L16.2929 5.79265C16.6262 6.12598 16.7929 6.29265 16.7929 6.49976C16.7929 6.70686 16.6262 6.87353 16.2929 7.20686L12 11.4998" stroke="#292E32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</g>
							</svg>

						</button>
					</div>
				</div>
				<div class="hotelic-notice-images">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/admin/img/hotelic-banner.png'); ?>" alt="<?php _e("Template Image", "hotelic"); ?>">
				</div>
			</div>
		</div>

		<script>
		jQuery(document).ready(function($) {
			$(document).on('click', '.hotelic-notice .notice-dismiss', function( event ) { 
				jQuery('.hotelic-notice.notice.notice-info').css('display', 'none')
				var cookieName = "hotelic_toolkit_activation_banner";
				var cookieValue = "1";

				// Create a date object for the expiration date
				var expirationDate = new Date(); 
				expirationDate.setTime(expirationDate.getTime() + (2 * 24 * 60 * 60 * 1000)); // 2 days in milliseconds

				// Construct the cookie string
				var cookieString = cookieName + "=" + cookieValue + ";expires=" + expirationDate.toUTCString() + ";path=/";

				// Set the cookie
				document.cookie = cookieString;
			});
		});
		</script>
	<?php
    }
}
if ( ! isset( $_COOKIE['hotelic_toolkit_activation_banner'] ) && !is_plugin_active( 'travelfic-toolkit/travelfic-toolkit.php' ) ) {
add_action( 'admin_notices', 'hotelic_starter_template_activation_admin_notice' );
}


// Handle the AJAX request
if ( ! is_plugin_active( 'travelfic-toolkit/travelfic-toolkit.php' ) ) {
	add_action('wp_ajax_travelfic-toolkit_ajax_install_plugin', 'wp_ajax_install_plugin');
}

add_action('wp_ajax_travelfic-toolkit_ajax_active_plugin', 'install_activate_plugin_callback');

function install_activate_plugin_callback() {

    check_ajax_referer('updates', '_ajax_nonce');
    // Check user capabilities
    if (!current_user_can('install_plugins')) {
        wp_send_json_error('Permission denied');
    }

    // activate the plugin
    $plugin_slug = sanitize_text_field( wp_unslash($_POST['slug']) );
    $result = activate_plugin($plugin_slug.'/'.$plugin_slug.'.php');

    if (is_wp_error($result)) {
        wp_send_json_error('Error: ' . $result->get_error_message());
    } else {
        wp_send_json_success('Plugin installed and activated successfully!');
    }

    wp_die();
}