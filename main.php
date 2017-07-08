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
      switch(mt_rand(1,6)) {
        case 1:
          $_SESSION["side1"] = "one";
          $_SESSION["side2"] = "one";
          $_SESSION["side3"] = "one";
          break;
        case 2:
          $_SESSION["side1"] = "two";
          $_SESSION["side2"] = "two";
          $_SESSION["side3"] = "two";
          break;
        case 3:
          $_SESSION["side1"] = "three";
          $_SESSION["side2"] = "three";
          $_SESSION["side3"] = "three";
          break;
        case 4:
          $_SESSION["side1"] = "four";
          $_SESSION["side2"] = "four";
          $_SESSION["side3"] = "four";
          break;
        case 5:
          $_SESSION["side1"] = "five";
          $_SESSION["side2"] = "five";
          $_SESSION["side3"] = "five";
          break;
        case 6:
          $_SESSION["side1"] = "six";
          $_SESSION["side2"] = "six";
          $_SESSION["side3"] = "six";
          break;
      }
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
