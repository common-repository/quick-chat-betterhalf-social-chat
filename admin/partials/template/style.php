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

if ( isset( $_POST['Pqf_style_button'] ) && ! empty( wp_verify_nonce( sanitize_key( $_POST['_wpnonce'] ), 'Pqf_quick_chat_style' ) ) ) {
	$data                           = array();
	$data['Pqf_chat_button_target'] = ! empty( sanitize_text_field( wp_unslash( $_POST['Pqf_chat_button_target'] ) ) ) ? sanitize_text_field( wp_unslash( $_POST['Pqf_chat_button_target'] ) ) : '_blank';
	$data['Pqf_chat_position']      = ! empty( sanitize_text_field( wp_unslash( $_POST['Pqf_chat_position'] ) ) ) ? sanitize_text_field( wp_unslash( $_POST['Pqf_chat_position'] ) ) : 'right';
	$data['Pqf_chat_button_style']  = ! empty( sanitize_text_field( wp_unslash( $_POST['Pqf_chat_button_style'] ) ) ) ? sanitize_text_field( wp_unslash( $_POST['Pqf_chat_button_style'] ) ) : 'Style_1';

	$array = array_merge( $get_options, $data );
	save_array( serialize( $array ) );
}
$get_options = unserialize( get_option( 'Pqf_whatup_data' ) );
?>

<form action="#" method="post">
	<?php wp_nonce_field( 'Pqf_quick_chat_style' ); ?>
	<table>
		<tr>
			<th scope="row">Style:</th>
			<td>
				<select name="Pqf_chat_button_style" id="Pqf_chat_button_style">
					<option <?php selected( esc_attr( $get_options['Pqf_chat_button_style'] ), 'Style_1' ); ?> value="Style_1">Style 1</option>
					<option <?php selected( esc_attr( $get_options['Pqf_chat_button_style'] ), 'Style_2' ); ?> value="Style_2">Style 2</option>
					<option <?php selected( esc_attr( $get_options['Pqf_chat_button_style'] ), 'Style_3' ); ?> value="Style_3">Style 3</option>
					<option <?php selected( esc_attr( $get_options['Pqf_chat_button_style'] ), 'Style_4' ); ?> value="Style_4">Style 4</option>
					<option <?php selected( esc_attr( $get_options['Pqf_chat_button_style'] ), 'Style_5' ); ?> value="Style_5">Style 5</option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row">Open link in :</th>
			<td>
				<select name="Pqf_chat_button_target" id="Pqf_chat_button_target">
					<option <?php selected( esc_attr( $get_options['Pqf_chat_button_target'] ), '_blank' ); ?> value="_blank">New Window</option>
					<option <?php selected( esc_attr( $get_options['Pqf_chat_button_target'] ), '_self' ); ?> value="_self">Same Window</option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row">Position :</th>
			<td>
				<select name="Pqf_chat_position" id="Pqf_chat_position">
					<option <?php selected( esc_attr( $get_options['Pqf_chat_position'] ), 'right' ); ?> value="right">Bottom Right</option>
					<option <?php selected( esc_attr( $get_options['Pqf_chat_position'] ), 'left' ); ?> value="left">Bottom Left</option>
				</select>
			</td>
		</tr> 
	</table>
	<?php
	$other_attributes = array( 'id' => 'Pqf_style_button' );
	submit_button( __( 'Save Settings', 'textdomain' ), 'primary', 'Pqf_style_button', true, $other_attributes );
	?>
</form>
