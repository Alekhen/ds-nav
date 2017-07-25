<?php
/**
 * Route definitions
 */

// Routes
$routes = [];
define( 'ROUTES', serialize( $routes ) );

// URLs
define( 'SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] );

// Root directory
define( 'ROOT_DIR', dirname( dirname( __FILE__ ) ) );

// General directories
define( 'DATABASE_DIR', ROOT_DIR . '/data' );
define( 'ICON_DIR', ROOT_DIR . '/icons' );
define( 'MODELS_DIR', ROOT_DIR . '/models' );
define( 'VIEWS_DIR', ROOT_DIR . '/views' );

// Data
define( 'NAV_DATABASE', DATABASE_DIR . '/nav.php' );
define( 'USER_DATABASE', DATABASE_DIR . '/user.php' );

// Models
define( 'FUNCTIONS_MODEL', MODELS_DIR . '/functions.php' );
define( 'NAV_MODEL', MODELS_DIR . '/nav.php' );
define( 'ROUTE_MODEL', MODELS_DIR . '/route.php' );
