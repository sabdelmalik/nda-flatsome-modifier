<?php
namespace NDA_FLATSOME;
/**
 * The public-facing functionality of the plugin.
 *
 * @link       nda.ca
 * @since      1.0.0
 *
 * @package    Nda_Flatsome_Modifier
 * @subpackage Nda_Flatsome_Modifier/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Nda_Flatsome_Modifier
 * @subpackage Nda_Flatsome_Modifier/public
 * @author     Sami Abdel Malik <sami.malik@sympatico.ca>
 */
class Nda_Flatsome_Modifier_Public {
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Nda_Flatsome_Modifier_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

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
	public function __construct( $plugin_name, $version, $loader ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
    $this->loader = $loader;

    $this->load_dependencies();
    $this->define_hooks();

    $this->instantiate_public_classes();
	}

    /**
	 * Load the required dependencies for this class.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
  }

  /**
	 * Register all of the hooks related to this class' functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
  private function define_hooks() {
		//$this->loader->add_action( 'wp_enqueue_scripts', $this, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $this, 'enqueue_scripts' );
    
    // wp_footer is the correct timing to load our css after Flatsome css is loaded
    // in order to ovrride its selectors.
    $this->loader->add_action( 'wp_footer', $this, 'override_flasome_effects_css' );
  }

  /**
	 * Instantiate admin classes
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function instantiate_public_classes() {
  }

  public function override_flasome_effects_css()
  {
    //error_log("=======>override_flasome_effects_css");
    //wp_enqueue_style( $this->plugin_name . "-css",  );
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nda-flatsome-modifier-public.css', array(), $this->version, 'all' );
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
		 * defined in Nda_Flatsome_Modifier_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nda_Flatsome_Modifier_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

    // To make this css override that of Flatsome,
    // we use wp_register_style instead of wp_enqueue_style
    wp_register_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nda-flatsome-modifier-public.css', array(), $this->version, 'all' );
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
		 * defined in Nda_Flatsome_Modifier_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nda_Flatsome_Modifier_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nda-flatsome-modifier-public.js', array( 'jquery' ), $this->version, false );

	}

}
