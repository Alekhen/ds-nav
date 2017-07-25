<?php
/**
 * Controls the routing of URL requests
 */

class Route {

	public $request = NULL;
	public $query = NULL;

	public function __construct() {

		$this->get_request();
		$this->debug_route();

	}

	protected function get_request() {

		// Initial request
		$request = preg_replace( "/^\//", "", $_SERVER['REQUEST_URI'] );

		// Remove slashes immediatly preceeding question marks
		$request = preg_replace( "/\/\?/", "?", $request );

		// Retrieve the query before removing it
		$this->get_query( $request );

		// Remove the query
		$request = preg_replace( "/\?(.*)/", "", $request );

		// Remove illegal ampersands
		$request = str_replace( "&", "", $request );

		// Remove illegal equal signs
		$request = str_replace( "=", "", $request );

		$this->request = !empty( $request ) ? explode( '/', $request ) : NULL;

	}

	protected function get_query( $request ) {

		if( !empty( $_POST ) ) : // POST query

			$this->query = $_POST;

		else : // GET query

			// Retrieve the query from the request
			preg_match( "/\?(.*)/", $request, $query );
			$query = ( !empty( $query ) && is_array( $query ) ) ? $query[0] : '';

			// Remove initial question mark(s)
			$query = preg_replace( "/^\?+/", "", $query );

			// Remove everything following an illegal question mark
			$query = preg_replace( "/\?(.*)/", "", $query );

			// Remove everything following an illegal slash
			//$query = preg_replace( "/\/(.*)/", "", $query );

			// Remove multiple double ampersands
			$query = preg_replace( "/\&\&+/", "&", $query );

			// Remove multiple equal signs
			$query = preg_replace( "/\=\=+/", "=", $query );

			// Build query array
			$params = explode( '&', $query );
			$query = array();
			foreach( $params as $param ) {
				$param = explode( '=', $param );
				$query[$param[0]] = !empty( $param[1] ) ? $param[1] : '';
			}

			$this->query = !empty( $query ) ? $query : NULL;

		endif;

	}

	protected function debug_route() {

		Functions::debug( DEBUG_ROUTING, $this->request );
		Functions::debug( DEBUG_ROUTING, $this->query );

	}

}
