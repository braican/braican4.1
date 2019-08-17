<?php
/**
 * Front page content.
 *
 * @package BraicanApi
 */

namespace BraicanApi\Endpoints;

/**
 * Build the endpoint for Global data.
 */
class FrontPage extends Base {
	/**
	 * The function that will return the content for the endpoint.
	 *
	 * @param array $request Data in the request.
	 *
	 * @return array
	 */
	public function get_content( $request ) {
		$lead = get_field( 'braican_lead', 'option' );
		$main = get_field( 'braican_main', 'option' );
		return array(
			'wordpress_id' => 1,
			'lead'         => $lead,
			'main'         => $main,
		);
	}

}
