<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

  <title>PHP Project</title>
  <link rel = "stylesheet" type="text/css" href="main.css">

</head>

<body>

  <?php

    $_SESSION["txt"] = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(array_key_exists('submit',$_POST)){
        roll();
      }
    }

    function roll() {
      $_SESSION["txt"] = "rolling";
    }

    function stopRoll() {
      $_SESSION["txt"] = mt_rand(1,6);
    }
  ?>

  <form method="post">
    <input type="submit" name="submit" id="submit" value="Submit">
  </form>

  <div class="container">
    <div class="die <?php echo $_SESSION["txt"] ?>"></div>
    <div class="die <?php echo $_SESSION["txt"] ?>"></div>
    <div class="die <?php echo $_SESSION["txt"] ?>"></div>
  </div>

</body>

</html>
