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
				'primary' => esc_html__( 'Primary', \Site::$text_domain ),
			)
		);
	}

}
