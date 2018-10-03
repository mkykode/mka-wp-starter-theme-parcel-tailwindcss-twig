<?php
/**
 * Define Site.separate_comments
 *
 * @package Setup
 */

/**
 * Main Site Class. Handles all Timber setup for site.
 */
class Site extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		parent::__construct();
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['menu'] = new Timber\Menu();
		$context['site'] = $this;
		return $context;
	}

	/**
	 * Theme Supports file.
	 *
	 * @return void
	 */
	public function theme_supports() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		add_theme_support( 'menus' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => auto,
				'width'       => auto,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		// Gutenberg ready.
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
	}
	/**
	 * Enqueue scripts/
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_style(
			'styles-bundle',
			get_template_directory_uri() . '/dist/site.css',
			[],
			filemtime( get_template_directory() . '/dist/site.css' )
		);

		wp_enqueue_script(
			'parcel-bundle',
			get_template_directory_uri() . '/dist/site.js',
			[ 'jquery' ],
			filemtime( get_template_directory() . '/dist/site.js' ),
			true
		);

	}
}
