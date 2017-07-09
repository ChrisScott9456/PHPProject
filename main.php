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
    $_SESSION["tot"] = "0";

    //Dealer's Dice
    $_SESSION["Dside1"] = "";
    $_SESSION["Dside2"] = "";
    $_SESSION["Dside3"] = "";
    $Droll1 = "";
    $Droll2 = "";
    $Droll3 = "";
    $_SESSION["Dtot"] = "0";

    //Button Visibility
    $_SESSION["rollVisible"] = "visible";
    $_SESSION["stopVisible"] = "invisible";

    //Win Condition
    $_SESSION["winCondition"] = "";
    $_SESSION["winVisible"] = "invisible";

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
      $_SESSION["tot"] = $roll1 + $roll2 + $roll3;

      //Set class of player dice to display correct side
      $_SESSION["side1"] = "d" . strval($roll1);
      $_SESSION["side2"] = "d" . strval($roll2);
      $_SESSION["side3"] = "d" . strval($roll3);

      //Randomize rolled dice value
      $Droll1 = mt_rand(1,6);
      $Droll2 = mt_rand(1,6);
      $Droll3 = mt_rand(1,6);
      $_SESSION["Dtot"] = $Droll1 + $Droll2 + $Droll3;

      //Set class of dealer dice to display correct side
      $_SESSION["Dside1"] = "d" . strval($Droll1);
      $_SESSION["Dside2"] = "d" . strval($Droll2);
      $_SESSION["Dside3"] = "d" . strval($Droll3);

      //Determine if the player or the dealer wins
      if($_SESSION["tot"] > $_SESSION["Dtot"]) {
        $_SESSION["winCondition"] = "You Win!";
      }else if($_SESSION["tot"] < $_SESSION["Dtot"]) {
        $_SESSION["winCondition"] = "Dealer Wins!";
      }else {
        $_SESSION["winCondition"] = "Draw!";
      }

      //Set Game Over message to visible
      $_SESSION["winVisible"] = "visible";
    }
  ?>

  <a href="main.php"><h1>Dice Game</h1></a>

  <a href="main.php"><div class="gameover" id="<?php echo $_SESSION["winVisible"] ?>"><?php echo $_SESSION["winCondition"] ?></div></a>

  <div class="container">
    <div class="die <?php echo $_SESSION["Dside1"] ?>"></div>
    <div class="die <?php echo $_SESSION["Dside2"] ?>"></div>
    <div class="die <?php echo $_SESSION["Dside3"] ?>"></div>
  </div>

  <br>

  <div class="container mid">
    <div class="container mid left">
      <p id="center">Dealer's Score:</p>
      <p id="center"><?php echo $_SESSION["Dtot"] ?></p>
    </div>
    <div class="container mid middle">
      <a href="main.php"><img src="vs.png" id="center"></img></a>
    </div>
    <div class="container mid right">
      <p id="center">Player's Score:</p>
      <p id="center"><?php echo $_SESSION["tot"] ?></p>
    </div>
  </div>

  <br>

  <div class="container">
    <div class="die <?php echo $_SESSION["side1"] ?>"></div>
    <div class="die <?php echo $_SESSION["side2"] ?>"></div>
    <div class="die <?php echo $_SESSION["side3"] ?>"></div>
  </div>

  <br>

  <form class="container2" method="post">
    <input type="submit" name="submit" value="ROLL" class="buttonRoll" id="<?php echo $_SESSION["rollVisible"] ?>">
    <input type="submit" value="STOP" class="buttonStop" id="<?php echo $_SESSION["stopVisible"] ?>">
  </form>

</body>

</html>
