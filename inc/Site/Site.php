<?php
/**
 * Define Site.separate_comments
 *
 * @package Setup
 */

use Site\Customizer as Customizer;
use Site\Setup as Setup;
/**
 * Main Site Class. Handles all Timber setup for site and actions.
 */
class Site extends Timber\Site {
	/**
	 * Text Domain
	 *
	 * @var string
	 */
	public static $text_domain = '';

	/**
	 * Constructor;
	 */
	public function __construct() {
		add_action( 'customizer_register', new Site\Customizer\Customizations() );
		add_action( 'after_setup_theme', [ new Setup\Supports(), 'theme_supports' ] );
		add_action( 'after_setup_theme', [ new Setup\Menus(), 'menu_locations' ] );
		add_action( 'wp_enqueue_scripts', [ new Setup\Enqueue(), 'enqueue_scripts' ] );
		add_filter( 'timber_context', [ $this, 'add_to_context' ] );

		parent::__construct();
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['menu'] = new Timber\Menu();
		$context['logo'] = get_custom_logo();
		$context['site'] = $this;

		return $context;
	}

}
