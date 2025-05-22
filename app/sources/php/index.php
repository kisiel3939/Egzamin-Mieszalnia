<?php
include 'includes/log.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: logowanie.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mieszalnia farb</title>
  <link rel="shortcut icon" href="../../res/img/fav.png" type="image/x-icon">
  <link rel="stylesheet" href="../styles/style.scss">
  <script src="../js/refresh.js"></script>
</head>

<body>
  <header>
    <img src="../../resources/img/baner.png" alt="Mieszalnia farb">
  </header>
  <div>
    <form action="" method="post">
      <label for="dateStart">Data odbioru od: </label>
      <input type="date" name="dateStart" id="dateStart">
      <label for="dateEnd">do: </label>
      <input type="date" name="dateEnd" id="dateEnd">
      <input type="submit" value="Wyszukaj">
    </form>
  </div>
  <main>
    <table>
      <tr>
        <th>Nr zamówienia</th>
        <th>Nazwisko</th>
        <th>Imię</th>
        <th>Kolor</th>
        <th>Pojemność [ml]</th>
        <th>Data odbioru</th>
      </tr>
      <?php include 'includes/table.php'; ?>
    </table>
  </main>
  <footer>
    <h3>Egzamin INF.03</h3>
    <p>Autor: 00000000000</p>
  </footer>
</body>

</html>