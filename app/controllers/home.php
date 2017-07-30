<?php

class Home extends Controller {

  public function index() {

    $database = $this->model( 'Database' );

    $database->get_data( 'UserData' );
    $database->get_data( 'NavData' );

    $this->view( 'header' );
    $this->view( 'shell', $database->data );
    $this->view( 'home/index' );
    $this->view( 'footer' );

  }

}
