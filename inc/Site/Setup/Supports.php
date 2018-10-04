<?php
/**
 * Theme Supports
 *
 * @package Site
 */
namespace Site\Setup;

/**
 * Supports
 */
class Supports {

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
				'width'       => 93,
				'height'      => 35,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		// Gutenberg ready.
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
	}

}

