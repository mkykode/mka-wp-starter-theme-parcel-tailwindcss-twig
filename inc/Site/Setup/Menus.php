<?php
/**
 * Setups scripts.
 *
 * @package Site
 */
namespace Site\Setup;

/**
 * Menu Locations.
 */
class Menus {
	/**
	 * Theme menu locations.
	 *
	 * @return void
	 */
	public function menu_locations() {
		register_nav_menus(
			array(
				'footer' => esc_html__( 'Footer', \Site::$text_domain ),
			)
		);
	}

}
