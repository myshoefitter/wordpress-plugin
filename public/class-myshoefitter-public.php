<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://myshoefitter.com
 * @since      1.0.0
 *
 * @package    myshoefitter
 * @subpackage myshoefitter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    myshoefitter
 * @subpackage myshoefitter/public
 * @author     mySHOEFITTER <support@myshoefitter.com>
 */
class myShoefitter_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    // Hook into the footer to add custom scripts
    add_action('wp_footer', array($this, 'add_myshoefitter_script'), 100);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in myShoefitter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The myShoefitter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/myshoefitter-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in myShoefitter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The myShoefitter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/myshoefitter-public.js', array( 'jquery' ), $this->version, false );

	}

      /**
     * Add the mySHOEFITTER script to the footer.
     *
     * @since    1.0.0
     */
  public function add_myshoefitter_script() {
    if ( class_exists( 'WooCommerce' ) ) {
      if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
        ?>
          <!-- Load the mySHOEFITTER Script -->
          <script src="http://localhost:3000/script.ts"></script>
  
          <!-- Initialize mySHOEFITTER -->
          <script type="application/javascript">
            myshoefitter.init({
              shopSystem: 'woocommerce'
            });
          </script>
        <?php
      }
    }
  }

}
