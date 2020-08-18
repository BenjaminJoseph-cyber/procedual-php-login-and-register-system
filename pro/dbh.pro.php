<?php

  define( 'USER', 'root' );
  define( 'PASS', '' );
  define( 'DBNAME', 'v_one' );

  $conn = mysqli_connect( $_SERVER['SERVER_NAME'], USER, PASS, DBNAME );

  if ( !$conn ):

    die( "Connection Error: " . mysqli_connect_error() );

  endif;