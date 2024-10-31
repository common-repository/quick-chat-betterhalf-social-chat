<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://peacefulqode.com/
 * @since      1.0.0
 *
 * @package    Quick_Chat
 * @subpackage Quick_Chat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Quick_Chat
 * @subpackage Quick_Chat/admin
 * @author     peacefulqode <peacefulthemes@gmail.com>
 */
class Quick_Chat_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Quick_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Quick_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/quick-chat-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Quick_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Quick_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/quick-chat-admin.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Quick Chat: add_plugin_settings_menu
	 * add Quick_Chat to menu
	 */
	public function add_plugin_settings_menu() {
		add_menu_page(
			esc_html__( 'Quick Chat', 'quick-chat' ),
			esc_html__( 'Quick Chat', 'quick-chat' ),
			'manage_options',
			'quick-chat',
			array( $this, 'settings_page' ),
			'',
			'99'
		);
	}
	/**
	 * Settings_page it will add to setting WordPress.
	 */
	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		} else {

			$this->theme_panel_welcome_render();
		}
	}
	/**
	 * Theme_redirect it will redirect to theme option page.
	 */
	public function theme_redirect() {
		global $pagenow;
		if ( is_admin() && isset( $_GET['activate'] ) && 'plugins.php' === $pagenow ) {
			wp_safe_redirect( esc_url( admin_url( 'admin.php?page=quick-chat' ) ) );
			exit;
		}
	}
	/**
	 * Theme_panel_welcome_render it show welcome page.
	 */
	public function theme_panel_welcome_render() {
		 require plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-display.php';
	}
	/**
	 * Add_Pqf_option it will add theme option name.
	 */
	public function add_Pqf_option() {
		add_option( 'Pqf_whatup_data', '' );
	}

}
