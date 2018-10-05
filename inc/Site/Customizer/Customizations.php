<?php
/**
 * Customizer extension class.
 *
 * @package Site\Customizer
 */

namespace Site\Customizer;

/**
 * Class that takes care of Customizer.
 */
class Customizations {
	/**
	 * Add postMessage support for site title and description for the Theme Customizer. Register all your panel, sections, controls, and settings here.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => [ $this, 'site_customize_partial_blogname' ],
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => [ $this, 'site_customize_partial_blogdescription' ],
				)
			);
		}
		// if you didn'y use Kirki add wp_Customize settings here.
	}
	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	public function site_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function site_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}
