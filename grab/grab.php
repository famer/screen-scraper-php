<?php

ini_set('memory_limit', 1024 * 1024 * 70);

include '../config/bootstrap.php';
include './lib/parseFunction.php';
include '../lib/convertFunctions.php';
Doctrine::loadModels('../models');

$query = new Doctrine_Query();
$cities = $query->from('City')->execute();
//$cities = array($cities[3]);
foreach ( $cities as $counter=>$City ) {
  echo $counter, $City->name."\n";
  $dayWeather = getDayWeather($City->gid);
  // Daily weather params
  // TODO: move this block after circle to do avarage math
  $DailyWeather = new DailyWeather();
  $DailyWeather->date = $dayWeather[0][date];
  $DailyWeather->maxTemperature = $dayWeather[2][temperature];
  $DailyWeather->minTemperature = $dayWeather[0][temperature];
  // TODO: more valuable description
  //$DailyWeather->description = $dayWeather[0][description].','.$dayWeather[1][description].','.$dayWeather[2][description];
  $DailyWeather->graph = $dayWeather[2][graph];
  $DailyWeather->sunrise = '08:25';
  $DailyWeather->sunset = '17:53';
  $DailyWeather->dayDuration = '09:28';
  // Detailed weather parse
  foreach ($dayWeather as $i=>$timeWeather) {
    echo $timeWeather[time], "\n" ; 
    $DetailedWeather = new DetailedWeather();
    $DetailedWeather->daytime = $i+1;
    $DetailedWeather->time = $timeWeather[time];
    $DetailedWeather->graph = $timeWeather[graph];
    $DetailedWeather->cloud = $timeWeather[cloud];
    $DetailedWeather->temperature = $timeWeather[temperature];
    $DetailedWeather->description = $timeWeather[description];
    $DetailedWeather->geDescription = '';
    $DetailedWeather->pressureMB = $timeWeather[pressureMB];
    $DetailedWeather->pressureTorr = mb2torr( $DetailedWeather->pressureMB );
    $DetailedWeather->precipitation = $timeWeather[precipitation];
    $DetailedWeather->humidity = $timeWeather[humidity];
    $DetailedWeather->windDirectionDegrees = $timeWeather[windDirection];
    $DetailedWeather->windDirectionLang = windDegrees2LangDirection ( $DetailedWeather->windDirectionDegrees  );
    $DetailedWeather->windSpeed = $timeWeather[windSpeed];
    $DailyWeather->DetailedWeather[] = $DetailedWeather;
    unset($DetailedWeather);

  }
  $City->DailyWeather[] = $DailyWeather;
  unset($DailyWeather);
  $City->save();
}
