<?php

  require "./includes/header.inc.php";

  if ( isset( $_SESSION['username'] ) ):

?>

  <div class="container">

    <main>

      <div class="body">

        <?php echo "<h3>Welcome " . strtoupper($_SESSION['username']) . "</h3>"; ?>

        <form action="./pro/logout.pro.php" method="POST">

          <button type="submit" class="btn btn-basic" name="logout-submit">Logout</button>

        </form>

      </div>

    </main>

  </div>

<?php

  require "./includes/footer.inc.php";

  else:

    header( "Location: ./index.php" );

    exit();

  endif;

?>