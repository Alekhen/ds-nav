<?php
/**
 * 403 error controller: forbidden
 */

require_once dirname( __FILE__ ) . '/config/config.php';

class Forbidden_Controller {

	public function __construct() {

		$this->forbidden_init();

	}

	protected function forbidden_init() {

		$this->forbidden_view();

	}

	protected function forbidden_view() {

		require_once VIEWS_DIR . '/403.php';

	}

}

new Forbidden_Controller();
