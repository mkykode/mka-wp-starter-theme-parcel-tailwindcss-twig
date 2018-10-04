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
	 * Constructor.
	 */
	public function __construct() {
		$this->customizations();
	}
	/**
	 * Customizer adjustments.
	 *
	 * @return void
	 */
	public function customizations() {

		// If you want to Use Kirki, otherwise add your wp_customize here.
		// new Kirki\Setup();
	}
}
