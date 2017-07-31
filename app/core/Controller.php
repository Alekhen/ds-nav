<?php

class Controller {

  public function model( $model ) {

    $error = "Error: requested model does not exist";

    if( file_exists( '../app/models/' . $model . '.php' ) ) :

      require_once '../app/models/' . $model . '.php';
      return new $model();

    else:

      exit( $error );

    endif;

  }

  public function view( $view, $data = [] ) {

    $error = "Error: requested view does not exist";

    if( file_exists( '../app/views/' . $view . '.php' ) ) :

      require_once '../app/views/' . $view . '.php';

    else :

      exit( $error );

    endif;

  }

  public function icon( $icon, $permanent = false ) {

    $default_icon = '../assets/icons/square.svg';
    $error = 'Error: requested icon does not exist';

    if( APP_ICONS_ACTIVE || $permanent ) :

      if( file_exists( '../assets/icons/' . $icon . '.svg' ) ) :

        include '../assets/icons/' . $icon . '.svg';

      else :

        if( file_exists( '../assets/icons/square.svg' ) ) :

          include $default_icon;

        else :

          exit( $error );

        endif;

      endif;

    else :

      if( file_exists( '../assets/icons/square.svg' ) ) :

        include $default_icon;

      else :

        exit( $error );

      endif;

    endif;

  }

}
