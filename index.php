<?php

  require "./includes/header.inc.php";

  if ( isset( $_SESSION['username'] ) ):

    header( "Location: ./profile.php" );

    exit();

  endif;

?>

  <div class="container">

    <main>

      <div class="header">
        <span class="login-title active">Login</span>
        <span class="reg-title">Register</span>
      </div>

      <div class="login-body body">
        <form action="./pro/login.pro.php" method="POST">
          <label for="mailuser">Username or E-mail</label>
          <input type="text" id="mailuser" name="mailuser" placeholder="Username or E-mail" required>
          <label for="password-login">Password</label>
          <input type="password" id="password-login" name="password" placeholder="Password" required>
          <button class="btn btn-basic" name="login" type="submit">Login</button>
        </form>
      </div>

      <div class="register-body body hide">
        <form action="./pro/signup.pro.php" method="POST">
          <label for="mail">E-mail</label>
          <input type="email" id="mail" name="mail" placeholder="E-mail" required>
          <label for="user">Username</label>
          <input type="text" id="user" name="user" placeholder="Username" required>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Password" required>
          <label for="c_password">Confirm Password</label>
          <input type="password" id="c_password" name="c_password" placeholder="Confirm Password" required>
          <button class="btn btn-basic" name="register" type="submit">Register</button>
        </form>
      </div>

    </main>

  </div>

<?php

  require "./includes/footer.inc.php";

?>