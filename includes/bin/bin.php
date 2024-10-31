<?php
/**
 * Bin File Doc Comment
 *
 * @category    Bin
 * @package     Quick_Chat
 * @author      peacefulqode
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://peacefulqode.com/
 */

/**
 * Enable_shortcode its an function that refer shortcode init
 *
 * @return void
 */
function enable_shortcode() {
	$get_options = unserialize( get_option( 'Pqf_whatup_data' ) );
	if ( 'true' === $get_options['custom_enable'] ) {

		add_shortcode( 'my_form_shortcode', 'Retun_Html' );
		add_action( 'wp_footer', 'retun_html_footer_hook' );
	}
}
add_action( 'wp_loaded', 'enable_shortcode' );
/**
 * Save_array
 *
 * @param mixed $data its an post data will you get.
 *
 * @return void
 */
function save_array( $data ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	$data        = maybe_unserialize( $data );
	$get_options = unserialize( get_option( 'Pqf_whatup_data' ) );
	my_plugin_install( $data );
}

/**
 * Get_my_option it will get all option value based on key.
 *
 * @param mixed $key     its contain key value.
 * @param mixed $default its contain key value.
 */
function get_my_option( $key, $default = null ) {
	$all_options = unserialize( get_option( 'Pqf_whatup_data' ) );
	if ( isset( $all_options[ $key ] ) ) {
		return $all_options[ $key ];
	}
}
/**
 * Update_my_option it will update option value based on key value.
 *
 * @param mixed $key   its contain key value.
 * @param mixed $value its contain post key value.
 */
function update_my_option( $key, $value ) {

	$all_options = unserialize( get_option( 'Pqf_whatup_data' ) );

	$all_options[ $key ] = $value;
	update_option( 'Pqf_whatup_data', serialize( $all_options ) );
}

/**
 * My_plugin_install check all post data with loop.
 *
 * @param mixed $data its have all key and value of $_POST.
 */
function my_plugin_install( $data ) {
	foreach ( $data as $key => $value ) {

		update_my_option( $key, $value );

	}
}
