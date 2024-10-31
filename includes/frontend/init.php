<?php
/**
 * Init File Doc Comment
 *
 * @category    Init
 * @package     Quick_Chat
 * @author      peacefulqode
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://peacefulqode.com/
 */

/**
 * Retun_html it will used for render-side.
 *
 * @return void
 */
function retun_html() {
	$get_options      = unserialize( get_option( 'Pqf_whatup_data' ) );
	$device_detection = ( wp_is_mobile() ) ? 'mobile_and_tablet' : 'desktop';
	$devices_url      = array(
		'mobile_and_tablet' => 'whatsapp://send',
		'desktop'           => 'https://web.whatsapp.com/send',
	);
	$chat_style       = $get_options['Pqf_chat_button_style'];
	$button_target    = $get_options['Pqf_chat_button_target'];
	$chat_args        = array(
		'phone' => $get_options['Pqf_whatsup_number'],
		'text'  => $get_options['Pqf_whatsup_chat_title'],
	);
	$chat_url         = add_query_arg( $chat_args, $devices_url[ $device_detection ] );
	?>
	<div id="Pqf_main_whatup_id" class="Pqf_main">

		<div id="Pqf_main_whatsup_container_id" class="Pqf_main_whatsup_container">
			<div class="Pqf_main_whatsup_<?php echo esc_attr( $chat_style ); ?>">
				<a id="Pqf_main_whatsup_href" href="<?php echo esc_attr( $chat_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>">
					<img src="<?php echo esc_url( QUICK_CHAT_URI . 'public/img/whatsapp.png' ); ?>">
					<span id="simple-chat-button--text">Need Help?</span>
				</a>
			</div>

		</div>
		<?php

}

/**
 * Retun_html_footer_hook return hook values.
 */
function retun_html_footer_hook() {
	retun_html();
	add_shortcode( 'my_form_shortcode', 'Retun_Html' );
}
