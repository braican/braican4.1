<?php
/**
 * Setup the API.
 *
 * @package BraicanApi.
 */

namespace BraicanApi\Managers;

/**
 * The API class.
 */
class API {
	/**
	 * API namespace.
	 *
	 * @var string
	 */
	public static $namespace = 'braican/v1';

	/**
	 * Initialize the API.
	 *
	 * @return void
	 */
	public static function init() {
		$api = new self();

		// Remove default WordPress endpoints, but only if the current user is not logged in since
		// the Gutenberg relies on the default REST API.
		if ( ! is_user_logged_in() ) {
			// add_filter( 'rest_endpoints', array( $api, 'remove_default_endpoints' ) );
		}

		// Create endpoints.
		add_action( 'rest_api_init', array( $api, 'setup_endpoints' ) );
	}

	/**
	 * Remove the default WordPress endpoints.
	 *
	 * @param array $endpoints List of active endpoints.
	 *
	 * @return array
	 */
	public function remove_default_endpoints( $endpoints ) {

		$whitelist = [
			self::$namespace,
		];

		foreach ( $endpoints as $endpoint => $details ) {
			$valid = false;

			foreach ( $whitelist as $allowed ) {
				if ( fnmatch( '/' . $allowed . '/*', $endpoint, FNM_CASEFOLD ) ) {
					$valid = true;
					break;
				}
			}

			if ( ! $valid ) {
				unset( $endpoints[ $endpoint ] );
			}
		}

		return $endpoints;
	}

	/**
	 * Register custom endpoints.
	 *
	 * @return void
	 */
	public function setup_endpoints() {
		$front_page = new \BraicanApi\Endpoints\FrontPage( 'front' );
	}
}
