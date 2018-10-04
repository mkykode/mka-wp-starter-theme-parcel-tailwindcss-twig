<?php
/**
 * Setups scripts.
 *
 * @package Site
 */
namespace Site\Setup;

/**
 * Enqueues Scripts.
 */
class Enqueue {
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->enqueue_scripts();
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
