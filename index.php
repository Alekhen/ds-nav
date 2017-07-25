<?php
/**
 * Index controller
 */

require_once dirname( __FILE__ ) . '/config/config.php';

class Index_Controller {

  public $view = NULL;
  public $sub = NULL;
  public $args = array();

  public function __construct() {

    global $Route;
    $this->view = !empty( $Route->request[1] ) ? $Route->request[1] : $this->view;
    $this->sub = !empty( $Route->request[2] ) ? $Route->request[2] : $this->sub;
    $this->args = !empty( $Route->query ) ? $Route->query : $this->args;

    $this->index_init();

  }

  protected function index_init() {

    switch( $this->view ) {

      default:
        $this->dashboard_view();
        break;

    }

  }

  protected function dashboard_view() {

    switch( $this->sub ) {

      default:
        require_once VIEWS_DIR . '/dashboard.php';
        break;

    }

  }

}

new Index_Controller();
