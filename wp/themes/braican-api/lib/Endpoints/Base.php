<?php
/**
 * Abstract class to build endpoints off of.
 *
 * @package BraicanApi
 */

namespace BraicanApi\Endpoints;

/**
 * Sets up a wrapper for endpoints.
 */
abstract class Base {
	/**
	 * Init this endpoint.
	 *
	 * @param string $route The path to the endpoint.
	 */
	public function __construct( $route ) {
		register_rest_route(
			\BraicanApi\Managers\API::$namespace,
			$route,
			array(
				'methods'  => 'GET',
				'callback' => array( $this, 'get_content' ),
			)
		);
	}

	/**
	 * The function that will return the content for the endpoint.
	 *
	 * @param array $request Data in the request.
	 *
	 * @return void
	 */
	abstract public function get_content( $request );
}
