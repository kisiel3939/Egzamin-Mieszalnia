<?php
include 'functions.php';
require_once '../../../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;

$logger = new Logger('default');

$logstream = new StreamHandler('../log/form.log', Logger::INFO);
$logstream->setFormatter(new JsonFormatter());

$logger->pushHandler($logstream);

$logger->pushProcessor(function ($record) {
  $dateEndDef = false;
  $dateStartDef = false;
  if ($_POST['dateStart'] == null or $_POST['dateEnd'] == null) {
    if ($_POST['dateStart'] == null) {
      $dateStart = getArrMin();
      $dateStartDef = true;
    }
    if ($_POST['dateEnd'] == null) {
      $dateEnd = getArrMax();
      $dateEndDef = true;
    }
  } else {
    $dateStart = $_POST['dateStart'];
    $dateStartDef = true;
    $dateEnd = $_POST['dateEnd'];
    $dateEndDef = true;
  }

  if ($dateStart < getArrMin()) {
    $record['extra']['out of bounds']['start date'] = true;
  } else $record['extra']['out of bounds']['start date'] = false;
  if ($dateEnd > getArrMax()) {
    $record['extra']['out of bounds']['end date'] = true;
  } else $record['extra']['out of bounds']['end date'] = false;

  $record['context']['user values'] = array('start date' => $dateStart, 'end date' => $dateEnd);
  $record['context']['user values']['info'] = array('start date isDefault' => $dateStartDef, 'end date isDefault' => $dateEndDef);
  $record['extra']['date bounds']['start date'] = getArrMin();
  $record['extra']['date bounds']['end date'] = getArrMax();

  $record['datetime'] = date("Y-m-d H:i:s -> e(P)");

  return $record;
});

$logger->info('form submited');
