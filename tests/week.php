<?php

include '../config/bootstrap.php';
include '../lib/convertFunctions.php';

Doctrine::loadModels('../models');

$City = Doctrine_Core::getTable('City')->findOneByName('Nizhniy Novgorod');
$weekWeather = $City->weekWeather(date('Y-m-d', time()+60*60*24));
//$DailyWeather = $City->DailyWeather->dayWeather(date('Y-m-d', time()+60*60*24));

//print_r($DailyWeather->toArray(true));
print_r( $weekWeather->toArray(true));
echo $weekWeather[0]->City['name'], "\n";
foreach ($weekWeather as $DailyWeather) {
  echo $DailyWeather->maxTemperature, "\n";
}


