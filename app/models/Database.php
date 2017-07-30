<?php

class Database {

  public $data = [];

  public function get_data( $data_object ) {

    if( file_exists( '../data/' . $data_object . '.php' ) ) {

      require_once '../data/' . $data_object . '.php';

      $object = new $data_object();

      //$reference = strtolower( $data_object );
      //$reference = str_replace( 'data', '', $reference );

      $this->data[$data_object] = $object->data;

    } else {

      exit( 'File not found' );

    }

  }

}
