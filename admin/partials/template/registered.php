<?php
/**
 * Template File Doc Comment
 *
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

if ( isset( $_POST['Pqf_submit_button'] ) && ! empty( wp_verify_nonce( sanitize_key( $_POST['_wpnonce'] ), 'Pqf_quick_chat' ) ) ) {
	$data                           = array();
	$data['Pqf_whatsup_chat_title'] = ! empty( sanitize_text_field( wp_unslash( $_POST['Pqf_whatsup_chat_title'] ) ) ) ? sanitize_text_field( wp_unslash( $_POST['Pqf_whatsup_chat_title'] ) ) : 'Hello.....';

	$data['Pqf_whatsup_number'] = ! empty( sanitize_text_field( wp_unslash( $_POST['Pqf_whatsup_number'] ) ) ) ? sanitize_text_field( wp_unslash( $_POST['Pqf_whatsup_number'] ) ) : '+01234567890';

	$data['Pqf_whatsup_button_text'] = ! empty( sanitize_text_field( wp_unslash( $_POST['Pqf_whatsup_button_text'] ) ) ) ? sanitize_text_field( wp_unslash( $_POST['Pqf_whatsup_button_text'] ) ) : 'Click Here To Chat';
	$data['custom_enable']           = ! empty( sanitize_text_field( wp_unslash( $_POST['custom_enable'] ) ) ) ? sanitize_text_field( wp_unslash( $_POST['custom_enable'] ) ) : 'false';
	save_array( $data );
}
$get_options = unserialize( get_option( 'Pqf_whatup_data' ) );
?>
<form action="#" method="post">
	<?php wp_nonce_field( 'Pqf_quick_chat' ); ?>
	<table>
		<tr>

			<th scope="row">
				<?php echo esc_html__( 'Enabled', 'quick-chat' ); ?> :	
			</th>
			<td>
				<input type="checkbox" name="custom_enable" value="true" id="custom_enable" <?php checked( esc_attr( $get_options['custom_enable'] ), 'true' ); ?> >
		</td>
	</tr>
	<tr>
		<th scope="row">
			<?php echo esc_html__( 'Whatsapp number', 'quick-chat' ); ?> :
		</th>
		<td>
			<input type="text" name="Pqf_whatsup_number" id="Pqf_whatsup_number" placeholder="<?php echo esc_html__( '8866766337', 'quick-chat' ); ?>" value="<?php echo esc_attr( $get_options['Pqf_whatsup_number'] ); ?>"/>
			<p class="description"><?php echo esc_html__( 'Enter Whatsapp number with country code (without any plus, preceding zero, hyphen, brackets, space).', 'quick-chat' ); ?></p>
		</td>
	</tr>
	<tr>
		<th scope="row">
			<?php echo esc_html__( 'Chat Pre-Build Text', 'quick-chat' ); ?>
		</th>
		<td>
			<textarea name="Pqf_whatsup_chat_title" id="Pqf_whatsup_chat_title" placeholder="<?php echo esc_html__( 'Hello', 'quick-chat' ); ?>"><?php echo esc_attr( $get_options['Pqf_whatsup_chat_title'] ); ?></textarea>

		</td>
	</tr>
	<tr>
		<th scope="row">
			<?php echo esc_html__( 'Button Text', 'quick-chat' ); ?>
		</th>
		<td>

			<input type="text" name="Pqf_whatsup_button_text" id="Pqf_whatsup_button_text" placeholder="<?php echo esc_html__( 'How can i help You ?', 'quick-chat' ); ?>" value="<?php echo esc_attr( $get_options['Pqf_whatsup_button_text'] ); ?>"/>

		</td>
	</tr>
</table>

<?php
$other_attributes = array( 'id' => 'Pqf_submit_button' );
submit_button( __( 'Save Settings', 'textdomain' ), 'primary', 'Pqf_submit_button', true, $other_attributes );
?>
</form>
