<?php
/**
 * Default site functions.
 *
 * @package BraicanApi
 */

define( 'BRAICAN_THEME_URI', get_template_directory_uri() );
define( 'BRAICAN_THEME_PATH', trailingslashit( dirname( __FILE__ ) ) );

require_once BRAICAN_THEME_PATH . 'vendor/autoload.php';

add_action(
	'init',
	function() {
		BraicanApi\Managers\PostTypes::register();
	}
);

add_action(
	'after_setup_theme',
	function() {
		$braican_api = BraicanApi\Managers\Api::init();
		$braican_theme = BraicanApi\Managers\Theme::init();
	}
);
