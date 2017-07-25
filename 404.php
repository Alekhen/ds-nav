<?php
/**
 * 404 error controller: not found
 */

require_once dirname( __FILE__ ) . '/config/config.php';

class Not_Found_Controller {

	public function __construct() {

		$this->not_found_init();

	}

	protected function not_found_init() {

		$this->not_found_view();

	}

	protected function not_found_view() {

		require_once VIEWS_DIR . '/404.php';

	}

}

new Not_Found_Controller();
