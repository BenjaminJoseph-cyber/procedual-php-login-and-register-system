<?php

  function head ( $value ) {

    header( "Location: " . $value );

    exit();
  
  }

  if ( isset( $_POST[ 'register' ] ) ):

    # Database Handler
    require './dbh.pro.php';
    
    # Variables
    $username = $_POST[ 'user' ];
    $email = $_POST[ 'mail' ];
    $password = $_POST[ 'password' ];
    $password_repeat = $_POST[ 'c_password' ];

    if ( empty( $username ) || empty( $email ) || empty( $password ) || empty( $password_repeat ) ):

      head( "../index.php" );

    elseif ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) && !preg_match( "/^[a-zA-Z0-9]*$/", $username ) ):

      head( "../index.php" );

    elseif ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ):

      head( "../index.php" );

    elseif ( !preg_match( "/^[a-zA-Z0-9]*$/", $username ) ):

      head( "../index.php" );

    elseif ( $password !== $password_repeat ):

      head( "../index.php" );

    else:

      $sql = "SELECT user FROM users WHERE user=?";
      $stmt = mysqli_stmt_init( $conn );
      $result = mysqli_stmt_prepare( $stmt, $sql );

      if ( !$result ):

        head( "../index.php" );

      else:

        mysqli_stmt_bind_param( $stmt, "s", $username );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        $result_check = mysqli_stmt_num_rows( $stmt );

        if ( $result_check > 0 ):

          head( "../index.php" );

        else:

          $sql = "INSERT INTO users ( mail,	user, pass ) VALUES ( ?, ?, ? )";
          $stmt = mysqli_stmt_init( $conn );
          $result = mysqli_stmt_prepare( $stmt, $sql );
    
          if ( !$result ):

            head( "../index.php" );
    
          else:

            $password_hashed = password_hash( $password, PASSWORD_DEFAULT );

            mysqli_stmt_bind_param( $stmt, "sss", $email, $username, $password_hashed );
            mysqli_stmt_execute( $stmt );

            head( "../index.php" );

          endif;

        endif;

      endif;

    endif;

    # Close Connection
    mysqli_stmt_close( $stmt );
    mysqli_close( $conn );

  else:

    head( "../index.php" );

  endif;