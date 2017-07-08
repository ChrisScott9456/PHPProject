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
    $_SESSION["rollVisible"] = "visible";
    $_SESSION["stopVisible"] = "invisible";

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
      $_SESSION["rollVisible"] = "invisible";
      $_SESSION["stopVisible"] = "visible";
    }

    function stopRoll() {
      $roll1 = mt_rand(1,6);
      $roll2 = mt_rand(1,6);
      $roll3 = mt_rand(1,6);
      $_SESSION["side1"] = "d" . strval($roll1);
      $_SESSION["side2"] = "d" . strval($roll2);
      $_SESSION["side3"] = "d" . strval($roll3);
    }
  ?>

  <form method="post">
    <input type="submit" name="submit" value="ROLL" id="<?php echo $_SESSION["rollVisible"] ?>">
    <input type="submit" value="STOP" id="<?php echo $_SESSION["stopVisible"] ?>">
  </form>

  <div class="container">
    <div class="die <?php echo $_SESSION["side1"] ?>"></div>
    <div class="die <?php echo $_SESSION["side2"] ?>"></div>
    <div class="die <?php echo $_SESSION["side3"] ?>"></div>
  </div>

</body>

</html>
