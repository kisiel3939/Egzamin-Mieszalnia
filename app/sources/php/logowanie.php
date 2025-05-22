<?php
include 'includes/db.php';
session_start();

$_POST['username'] = '';
$_POST['password'] = '';

if (($_POST['username'] and $_POST['password']) != null) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashed = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $conn->prepare('select username,password from klienci where = :username');
  $stmt->bindParam(':username', $hashed, PDO::PARAM_STR);
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logowanie</title>
  <link rel="shortcut icon" href="../../res/img/fav.png" type="image/x-icon">
  <link rel="stylesheet" href="../styles/style.scss">
  <script src="../js/refresh.js"></script>
</head>

<body>
  <div id="main">
    <form action="logowanie.php" method="post">
      <p>Nazwa Użytkownika: </p>
      <input type="text" name="username" id="username"><br>
      <p>Hasło: </p>
      <input type="password" name="password" id="password"><br>
      <input type="submit" value="Wyszukaj">
    </form>
  </div>
</body>

</html>