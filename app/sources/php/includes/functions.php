<?php

function getArrMin()
{
  $arrMin = array();
  include 'includes/db.php';
  $stmt = $conn->prepare('select data_odbioru from zamowienia order by data_odbioru asc limit 1');
  $stmt->execute();
  $data = $stmt->fetchALL(PDO::FETCH_ASSOC);
  foreach ($data as $item) {
    array_push($arrMin, $item['data_odbioru']);
  }
  return $arrMin;
};
function getArrMax()
{
  $arrMax = array();
  include 'includes/db.php';
  $stmt = $conn->prepare('select data_odbioru from zamowienia order by data_odbioru desc limit 1');
  $stmt->execute();
  $data = $stmt->fetchALL(PDO::FETCH_ASSOC);
  foreach ($data as $item) {
    array_push($arrMax, $item['data_odbioru']);
  }
  return $arrMax;
};
