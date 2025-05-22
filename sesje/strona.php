<?php
  session_start();
  if (!isset($_SESSION['log'])){
    header('location:loguj.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Strona główna</title>
</head>
<body>
  <?php
    $imie=ucfirst($_SESSION['log']);
    echo "Witaj ".$imie;
  ?>
  <p>Jesteś na stronie głównej</p>
  <p>Przed opuszczeniem strony wyloguj się!</p>
  <a href="wyloguj.php">Wyloguj</a>
</body>
</html>