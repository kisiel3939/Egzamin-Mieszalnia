<?php
  session_start();
  if (isset($_SESSION['log'])){
    unset($_SESSION['log']);
  }else{
    header('location:loguj.php');
    exit;
  }
  $s=session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Koniec sesji</title>
</head>
<body>
  <p>Wylogowałeś się ze strony</p>
  <a href="loguj.php">Logowanie</a>
</body>
</html>