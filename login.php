#!/usr/local/bin/php
<?php

 session_save_path(__DIR__ . '/sessions/');
  session_name('login_w_password');
  session_start();
  $incorr_submiss = false;
  if (isset($_POST['passwordSub'])) {
    validate($_POST['passwordSub'], $incorr_submiss);
  }


  function validate($submiss, &$incorr_submiss) {
    $file = fopen('h_password.txt', 'r') or die('Unable to find the hashed password');
    $hashed_password = fgets($file);
    $hashed_password = trim($hashed_password);

    fclose($file);

    $hashed_submiss = hash('md2', $submiss);

    if ($hashed_submiss !== $hashed_password) {
      $_SESSION['loggedin'] = false;
      $incorr_submiss = true;
    }
    else {
      $_SESSION['loggedin'] = true;
      header('Location: welcome.php');
      exit;
    }
  }


      ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Shut The Box</title>
    <link rel="stylesheet" href = "style.css">
  </head>

  <body>
    <header>
      <h1>Welcome! Ready to play "Shut the Box"?</h1>
    </header>

    <main>
    <section>
    <h2> Login </h>
    <p> In order to play you need a password</p>
    <p> If you know it, please enter it below and login</p>
    </section>
    <fieldset>
    <form enctype="multipart/form-data" method = "POST" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for = "passwordentry">Password:</label>
    <input type="password" id = "passwordentry" name = "passwordSub">
    <input type="submit" value = "login">
      </fieldset>
      <?php
      if ($incorr_submiss){
        echo "Invalid Password!";
      }
      ?>
    </main>

    <footer>
      <hr>
      <small>
        &copy; Angelina Kim, 2020
      </small>
    </footer>
  </body>

</html>