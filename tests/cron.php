#!/usr/bin/php
<?php
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);

include '../config/bootstrap.php';

Doctrine::loadModels('../models');

if ( count( $argv ) > 1 ) {
  $Cities = array();
  $ids = array_slice ( $argv , 1);
  foreach ( $ids as $id ) {
    $Cities[] = Doctrine::getTable('City')->find($id);
  }
} else {
  if (!($Cities = Doctrine::getTable('City')->findAll())) {
    die('No such city');
  }
}

echo date('H:i:s'), "\n";
foreach ( $Cities as $key=>$City ) {
  echo  $key, ':', $City->name, "\n";

  for ( $nDate = 1; $nDate < 7;  $nDate++) {
    $url = 'http://freemeteo.com/default.asp?pid=19&la=1&gid='.$City->gid.'&nDate='.$nDate;

    sleep(1);
    //$pageString = file_get_contents ( $url );
    // Try get till got requested page
    while ( ! ( $pageString = file_get_contents ($url) ) ) sleep(1);
    $weathers = array();
    $weathers[] = new DailyWeather();
    $weathers[] = new NightWeather();
    $weathers[] = new MorningWeather();
    $weathers[] = new DayWeather();
    $weathers[] = new EveningWeather();
    foreach ($weathers as $weather) {
      $weather->loadFromString($pageString);
    }
    $weathers[0]->City = $City;
    $weathers[0]->NightWeather = $weathers[1];
    $weathers[0]->MorningWeather = $weathers[2];
    $weathers[0]->DayWeather = $weathers[3];
    $weathers[0]->EveningWeather = $weathers[4];
    $weathers[0]->replace();
    echo $weathers[0]->date, "\n";
    foreach ($weathers as $weather) {
      $weather->free();
    }
    unset($weathers);
  }
  echo "\n";
}
echo date('H:i:s'), "\n";
return 0;
