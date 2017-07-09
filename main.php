<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

  <title>PHP Project</title>
  <link rel = "stylesheet" type="text/css" href="main.css">

</head>

<body>

  <?php
    //Player's Dice
    $_SESSION["side1"] = "";
    $_SESSION["side2"] = "";
    $_SESSION["side3"] = "";
    $roll1 = "";
    $roll2 = "";
    $roll3 = "";

    //Dealer's Dice
    $_SESSION["Dside1"] = "";
    $_SESSION["Dside2"] = "";
    $_SESSION["Dside3"] = "";
    $Droll1 = "";
    $Droll2 = "";
    $Droll3 = "";

    //Button Visibility
    $_SESSION["rollVisible"] = "visible";
    $_SESSION["stopVisible"] = "invisible";

    //Checks if button has been pressed to start/stop rolling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(array_key_exists('submit',$_POST)){
        roll();
      }else{
        stopRoll();
      }
    }

    function roll() {
      //Player's Dice
      $_SESSION["side1"] = "rolling";
      $_SESSION["side2"] = "rolling";
      $_SESSION["side3"] = "rolling";

      //Dealer's Dice
      $_SESSION["Dside1"] = "rolling";
      $_SESSION["Dside2"] = "rolling";
      $_SESSION["Dside3"] = "rolling";

      //Button Visibility
      $_SESSION["rollVisible"] = "invisible";
      $_SESSION["stopVisible"] = "visible";
    }

    function stopRoll() {
      //Randomize rolled dice value
      $roll1 = mt_rand(1,6);
      $roll2 = mt_rand(1,6);
      $roll3 = mt_rand(1,6);

      //Set class of player dice to display correct side
      $_SESSION["side1"] = "d" . strval($roll1);
      $_SESSION["side2"] = "d" . strval($roll2);
      $_SESSION["side3"] = "d" . strval($roll3);

      //Randomize rolled dice value
      $Droll1 = mt_rand(1,6);
      $Droll2 = mt_rand(1,6);
      $Droll3 = mt_rand(1,6);

      //Set class of dealer dice to display correct side
      $_SESSION["Dside1"] = "d" . strval($Droll1);
      $_SESSION["Dside2"] = "d" . strval($Droll2);
      $_SESSION["Dside3"] = "d" . strval($Droll3);
    }
  ?>

  <div class="container">
    <div class="die <?php echo $_SESSION["Dside1"] ?>"></div>
    <div class="die <?php echo $_SESSION["Dside2"] ?>"></div>
    <div class="die <?php echo $_SESSION["Dside3"] ?>"></div>
  </div>

  <a href="main.php"><img src="vs.png" id="center"></img></a>

  <div class="container">
    <div class="die <?php echo $_SESSION["side1"] ?>"></div>
    <div class="die <?php echo $_SESSION["side2"] ?>"></div>
    <div class="die <?php echo $_SESSION["side3"] ?>"></div>
  </div>

  <form class="container2" method="post">
    <input type="submit" name="submit" value="ROLL" class="buttonRoll" id="<?php echo $_SESSION["rollVisible"] ?>">
    <input type="submit" value="STOP" class="buttonStop" id="<?php echo $_SESSION["stopVisible"] ?>">
  </form>

</body>

</html>
