<?php

class Home extends Controller {

  public function index() {

    // Retrieve data from the database
    $database = $this->model( 'Database' );
    $database->get_data( 'UserData' );
    $database->get_data( 'NavData' );

    // Render view
    $this->view( 'header' );
    $this->view( 'shell', $database->data );
    $this->view( 'home/index' );
    $this->view( 'footer' );

  }

}
