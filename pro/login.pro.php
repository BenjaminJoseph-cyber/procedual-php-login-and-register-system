<?php

  function head ( $value ) {

    header( "Location: " . $value );

    exit();
  
  }

  if ( isset( $_POST[ 'login' ] ) ):

    # Database Handler
    require './dbh.pro.php';
    
    # Variables
    $mailuid = $_POST['mailuser'];
    $password = $_POST['password'];

    if ( empty( $mailuid ) || empty( $password ) ):
      
      head( "../index.php" );

    else:

      $sql = "SELECT * FROM users WHERE user=? OR mail=?;";
      $stmt = mysqli_stmt_init( $conn );
      $result = mysqli_stmt_prepare( $stmt, $sql );

      if ( !$result ):
      
        head( "../index.php" );

      else:

        mysqli_stmt_bind_param( $stmt, "ss", $mailuid, $mailuid );
        mysqli_stmt_execute( $stmt );
        $result_check = mysqli_stmt_get_result( $stmt );

        if ( $row = mysqli_fetch_assoc( $result_check ) ):

          $pwd_check = password_verify( $password, $row[ 'pass' ] );

          if ( $pwd_check == false ):
      
            head( "../index.php" );

          elseif ( $pwd_check == true ):

            # Start Session
            session_start();
            $_SESSION['username'] = $row['user'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['mail'];
      
            head( "../profile.php" );

          else:
      
            head( "../index.php" );

          endif;

        else:
      
          head( "../index.php" );

        endif;

      endif;

    endif;


  else:
      
    head( "../index.php" );

  endif;