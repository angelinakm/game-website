#!/usr/local/bin/php
<?php
session_save_path(__DIR__ . '/sessions/');
session_name('login_w_password');
session_start();

$welcome = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
if($welcome===false){
  header ("Location:login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Shut the Box</title>
    <script src="username.js" defer></script>
    <script src="welcome.js" defer></script>
    <link rel="stylesheet" href = "style.css">
  </head>

  <body>
    <header>
      <h1>Welcome! Ready to play "Shut the box?"</h1>
    </header>
    <main>
      <section>
        <h2>Choose a username <br /></h2>
        <p>So that we can post your scores, please choose a username.</p>
        <fieldset>
          <label for="username">Username: </label>
          <input type="text" id="username" />
          <input type="button" value="Submit" id="button" />
        </fieldset>
      </section>
    </main>

    <footer>
      <hr />
      <small> &copy; Angelina Kim, 2020 </small>
    </footer>
  </body>
</html>
