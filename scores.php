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


if(isset($_GET['getScores'])){
$fileread = file_get_contents(__DIR__."/scores.txt");
echo $fileread;
exit;
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Shut The Box</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="scores.js" defer></script>
    <link rel="stylesheet" href = "style.css">
  </head>

  <body>
    <header>
      <h1>Shut The Box</h1>
    </header>

    <main>
        <section>
            <h2>Scores</h2>
            <p> Well done! Here are the scores so far...</p>
            <p id="text"></p>
        </section>
        <fieldset> 
            <input type = "button" value = "PLAY AGAIN!!!" onclick = "redirect();">
        </fieldset>
        <fieldset> 
            <input type = "button" value = "Force update/start updating" onclick = "print();">
            <input type = "button" value = "Stop updating" onclick = "stop_printing();">
        </fieldset>   
    </main>

    <footer>
      <hr>
      <small>
        &copy; Angelina Kim, 2020
      </small>
    </footer>
  </body>

</html>