<?php
/**
 * Assets required on site load
 */

// Required faux database data
require_once NAV_DATABASE;
require_once USER_DATABASE;

// Required models
require_once FUNCTIONS_MODEL;
require_once NAV_MODEL;
require_once ROUTE_MODEL;

// Instantiations
$Route = new Route();

// Load appropriate controller
if( !empty( $Route->request[0] ) ) :

	if( in_array( $Route->request[0], unserialize( ROUTES ) ) ) {

		include $Route->request[0] . '.php';

	} else {

		include '404.php'; // Error: not found

	}

	exit();

endif;
