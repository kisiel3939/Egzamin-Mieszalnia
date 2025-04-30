<?php
include 'db.php';

$dateStart = $_POST['dateStart'];
$dateEnd = $_POST['dateEnd'];

if ($dateStart and $dateEnd != null) {
  $stmt = $conn->prepare('SELECT klienci.nazwisko,klienci.imie,zamowienia.id,zamowienia.kod_koloru,zamowienia.pojemnosc,zamowienia.data_odbioru FROM klienci INNER JOIN zamowienia ON klienci.id = zamowienia.id_klienta WHERE zamowienia.data_odbioru BETWEEN :dateStart AND :dateEnd ');

  $stmt->bindParam(':dateStart', $dateStart, PDO::PARAM_STR);
  $stmt->bindParam(':dateEnd', $dateEnd, PDO::PARAM_STR);
} else {
  $stmt = $conn->prepare('SELECT klienci.nazwisko,klienci.imie,zamowienia.id,zamowienia.kod_koloru,zamowienia.pojemnosc,zamowienia.data_odbioru FROM klienci INNER JOIN zamowienia ON klienci.id = zamowienia.id_klienta ORDER BY zamowienia.data_odbioru ASC');
}
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $item) {
  echo '<tr>';
  echo '<td>' . $item['id'] . '</td>';
  echo '<td>' . $item['nazwisko'] . '</td>';
  echo '<td>' . $item['imie'] . '</td>';
  echo '<td style="background: #' . $item['kod_koloru'] . '">' . $item['kod_koloru'] . '</td>';
  echo '<td>' . $item['pojemnosc'] . '</td>';
  echo '<td>' . $item['data_odbioru'] . '</td>';
  echo '</tr>';
}


$conn = null;
