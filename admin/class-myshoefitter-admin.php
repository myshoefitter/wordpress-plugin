<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://myshoefitter.com
 * @since      1.0.0
 *
 * @package    myshoefitter
 * @subpackage myshoefitter/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    myshoefitter
 * @subpackage myshoefitter/admin
 * @author     mySHOEFITTER <support@myshoefitter.com>
 */
class myShoefitter_Admin
{

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
   * @param      string    $plugin_name       The name of this plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct($plugin_name, $version)
  {

    $this->plugin_name = $plugin_name;
    $this->version = $version;
  }

  /**
   * Register the stylesheets for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_styles()
  {

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

    wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/myshoefitter-admin.css', array(), $this->version, 'all');
  }

  /**
   * Register the JavaScript for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts()
  {

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

    wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/myshoefitter-admin.js', array('jquery'), $this->version, false);
  }

  public function add_admin_menu()
  {
    add_options_page('mySHOEFITTER', 'mySHOEFITTER', 'manage_options', 'myshoefitter', array($this, 'init_checklist_page'));
  }

  public function init_checklist_page()
  {
?>
    <div class="wrap">
      <div class="content">
        <img src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/banner.png' ); ?>" alt="mySHOEFITTER Banner" class="banner" />
        <h2>Introduction</h2>
        <p>
          mySHOEFITTER is an innovative web software designed to revolutionize the way you shop for footwear online. Through advanced technology, we allow customers to accurately <b>determine their perfect shoe size</b> from the comfort of their own home.
        </p>
        <p>
          <b>Simply by taking a photo of their foot</b>, customers can bypass the guesswork and uncertainty that often comes with selecting shoe sizes online. Our software, once implemented into your online shop, analyzes the photo and calculates the precise dimensions of the foot. Using this data, it recommends the ideal shoe size for every style and brand you carry.
        </p>
        <p>
          Beyond providing convenience to customers, mySHOEFITTER also offers significant benefits to retailers. By <b>reducing size-related returns</b> and exchanges, it improves customer satisfaction and helps businesses operate more efficiently.
        </p>

        <div style="height: 10px;"></div>

        <h2>Checks</h2>
        <ul class="list">
        <li>
          <strong>WooCommerce installed:</strong>
          <span class="badge <?php echo esc_attr( class_exists('WooCommerce') ? 'enabled' : 'disabled' ); ?>">
            <?php echo esc_html( class_exists('WooCommerce') ? 'Yes' : 'No' ); ?>
          </span>
          <p>Checks if WooCommerce is installed for eCommerce features.</p>
          </li>
          <li>
            <strong>REST API enabled:</strong>
            <span class="badge <?php echo esc_attr( rest_url() ? 'enabled' : 'disabled' ); ?>">
              <?php echo esc_html( rest_url() ? 'Yes' : 'No' ); ?>
            </span>
            <p><b>Optional!</b> Verifies that the REST API is accessible.</p>
          </li>
        </ul>

        <div style="height: 10px;"></div>

        <h2>Next Steps</h2>
        <ol>
          <li>Check if the Button gets displayed below the "Add to Cart" Button.</li>
          <li>Add the inner sizes of your shoes in our Dashboard to receive better results. <b>Coming Soon!</b></li>
        </ol>

        <div style="height: 20px;"></div>

        <a href="https://myshoefitter.com/en/?utm_source=wp-plugin" class="button-primary" target="_black"><?php esc_html_e( 'Visit mySHOEFITTER Website', 'myshoefitter' ); ?></a>
      </div>
    </div>
<?php
  }
}
