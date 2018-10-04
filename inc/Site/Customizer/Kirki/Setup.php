<?php
/**
 * Setups Kirki.
 *
 * @package Site
 */

namespace Site\Customizer\Kirki;

use \Kirki as Kirki;
/**
 * Kirki setup.
 */
class Setup {
	/**
	 * Constructor
	 */
	public function __construct() {
		// Check if Plugin is active.
		add_action( 'customize_register', [ $this, 'kirki_installer_register' ], 999 );
		add_action( 'wp_ajax_kirki_installer_dismiss', [ $this, 'kirki_installer_dismiss' ] );
		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}
		$this->kirki_defintions();

	}
	/**
	 * Setups sections, controls, panels, and settings.
	 *
	 * @return void
	 */
	public function kirki_defintions() {
		// Define Panels, sections, controls and settings here.
	}

	/**
	 * Kirki installer check
	 *
	 * @param object $wp_customize Wp Customizer object.
	 * @return void
	 */
	public function kirki_installer_register( $wp_customize ) {
		// Early exit if Kirki exists.
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		// Early exit if the user has dismissed the notice.
		if ( is_callable( array( 'Kirki_Installer_Section', 'is_dismissed' ) ) && Kirki_Installer_Section::is_dismissed() ) {
			return;
		}
		$wp_customize->add_section(
			new Kirki_Installer_Section(
				$wp_customize,
				'kirki_installer',
				array(
					'title'      => '',
					'capability' => 'install_plugins',
					'priority'   => 0,
				)
			)
		);
		$wp_customize->add_setting(
			'kirki_installer_setting',
			array(
				'sanitize_callback' => '__return_true',
			)
		);
		$wp_customize->add_control(
			'kirki_installer_control',
			array(
				'section'  => 'kirki_installer',
				'settings' => 'kirki_installer_setting',
			)
		);
	}

	/**
	 * Handles dismissing the plgin-install/activate recommendation.
	 * If the user clicks the "Don't show this again" button, save as user-meta.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function kirki_installer_dismiss() {
		check_ajax_referer( 'dismiss-kirki-recommendation', 'security' );
		$user_id = get_current_user_id();
		// @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.user_meta_update_user_meta
		if ( update_user_meta( $user_id, 'dismiss-kirki-recommendation', true ) ) {
			echo 'success! :-)';
			wp_die();
		}
		echo 'failed :-(';
		wp_die();
	}

}
