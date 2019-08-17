<?php
/**
 * Theme setup for the entire site.
 *
 * @package BraicanApi
 */

namespace BraicanApi\Managers;

/**
 * Setup the site stuff.
 */
class Theme {
	/**
	 * Setup the site stuff.
	 *
	 * @return void
	 */
	public static function init() {
		$theme = new self();

		$theme->add_settings_pages();
	}


	/**
	 * Add settings pages.
	 *
	 * @return void
	 */
	private function add_settings_pages() {
		if ( ! function_exists( 'acf_add_options_page' ) ) {
			return;
		}

		acf_add_options_page(
			array(
				'page_title' => 'Home Page',
				'menu_title' => 'Home Page',
				'menu_slug'  => 'Home Page',
				'position'   => '15.1',
				'icon_url'   => 'dashicons-admin-home',
			)
		);
	}
}
