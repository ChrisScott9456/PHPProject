<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

  <title>PHP Project</title>
  <link rel = "stylesheet" type="text/css" href="main.css">

</head>

<body>

  <?php

    $_SESSION["side1"] = "";
    $_SESSION["side2"] = "";
    $_SESSION["side3"] = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(array_key_exists('submit',$_POST)){
        roll();
      }else{
        stopRoll();
      }
    }

    function roll() {
      $_SESSION["side1"] = "rolling";
      $_SESSION["side2"] = "rolling";
      $_SESSION["side3"] = "rolling";
    }

    function stopRoll() {
      $_SESSION["side1"] = "d" . strval(mt_rand(1,6));
      $_SESSION["side2"] = "d" . strval(mt_rand(1,6));
      $_SESSION["side3"] = "d" . strval(mt_rand(1,6));
    }
  ?>

  <form method="post">
    <input type="submit" name="submit" value="ROLL">
    <input type="submit" name="submit2" value="STOP">
  </form>

  <div class="container">
    <div class="die <?php echo $_SESSION["side1"] ?>"></div>
    <div class="die <?php echo $_SESSION["side2"] ?>"></div>
    <div class="die <?php echo $_SESSION["side3"] ?>"></div>
  </div>

</body>

</html>
