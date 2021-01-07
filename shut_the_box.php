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

if(isset($_COOKIE['username'])===false){
  header("Location: welcome.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Shut the Box</title>
    <script src="shut_the_box.js" defer></script>
    <script src="username.js" defer></script>
    <link rel="stylesheet" href = "style.css">
  </head>

  <body>
    <header>
      <h1>Shut the Box</h1>
    </header>
    <main>
      <section>
        <h2>Rules of the Game</h2>
        <ol type="i">
          <li>
            Each turn, roll a dice and select one or more boxes which sum to the
            value of your roll
          </li>
          <li>
            You will not be allowed to pick the boxes which you choose on
            subsequent turns
          </li>
          <li>
            When the sume of boxes which are left is less than or equal 6, you
            will only roll one die
          </li>
          <li>
            When you cannot make a move you give up, the sum of boxes which are
            left gives your the score
          </li>
          <li>
            Lower scores are better and a score of 0 is called 'shutting the
            box'
          </li>
        </ol>
      </section>
      <section>
        <h2>Dice Roll</h2>
        <fieldset class = "fieldset_button">
          <input type="button" value="Roll dice"/> Result: <span class="text" ></span>
        </fieldset>
      </section>
      <section>
        <h2>Box Selection <br /></h2>
      </section>
      <table class="table">
        <thead>
          <tr><th>
          <fieldset>
         
           <label for = "checkbox">
            1</label></fieldset></th>
            <th>
            <fieldset>
             <label for = "checkbox2">
            2</label></fieldset></th>
            <th>  <fieldset><label for = "checkbox3">
            3</label></fieldset></th>
            <th>  <fieldset>
            <label for = "checkbox4">
            4</label>  </fieldset></th>
            <th>  <fieldset>
            <label for = "checkbox5">
            5</label>  </fieldset></th>
            <th>  <fieldset>
            <label for = "checkbox6">
            6</label>  </fieldset></th>
            <th>  <fieldset>
            <label for = "checkbox7">
            7</label>  </fieldset></th>
            <th>  <fieldset>
            <label for = "checkbox8">
           8</label>  </fieldset></th>
            <th>  <fieldset>
            <label for = "checkbox9">
            9</label>  </fieldset></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox" id = "checkbox"></td>
            <td><input type="checkbox"id = "checkbox2" /></td>
            <td><input type="checkbox"id = "checkbox3" /></td>
            <td><input type="checkbox" id = "checkbox4"/></td>
            <td><input type="checkbox" id = "checkbox5"/></td>
            <td><input type="checkbox" id = "checkbox6"/></td>
            <td><input type="checkbox" id = "checkbox7"/></td>
            <td><input type="checkbox" id = "checkbox8"/></td>
            <td><input type="checkbox" id = "checkbox9"/></td>
          </tr>
        </tbody>
      </table>
      <fieldset class = fieldset_button>
        <input
          type="button"
          id="submit_button"
          value="Submit box selection"
          onclick="check_submission();"
        />
        <input type="button" value="I give up/Can't make a valid move" onclick="finish();" />
      </fieldset>
      <div id = "response"> </div>
    </main>

    <footer>
      <hr />
      <small> &copy; Angelina Kim, 2020 </small>
    </footer>
  </body>
</html>
