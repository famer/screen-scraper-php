<?php

include '../config/bootstrap.php';
include '../lib/convertFunctions.php';

Doctrine::loadModels('./models');

$gid = 520555;
if (!($City = Doctrine_Core::getTable('City')->findOneByGid($gid))) {
  die('No such city');
  return false;
} else {
  $date = '2010-11-05';
  if (!($DailyWeather = Doctrine_Core::getTable('DailyWeather')->findOneByCity_idAndDate($City->id, $date))) {
    $DailyWeather = new DailyWeather();
  }
  $DailyWeather->date = $date;

  $DetailedWeather = new DetailedWeather();

  $DetailedWeather->daytime = 1;
  $DetailedWeather->time = '03:00';
  $DetailedWeather->graph = 1;
  $DetailedWeather->cloud = 75;
  $DetailedWeather->temperature = -35.2;
  $DetailedWeather->description = 'Cloudy weather';
  $DetailedWeather->geDescription = '';
  $DetailedWeather->pressureMB = 1035.2;
  $DetailedWeather->pressureTorr = mb2torr( $DetailedWeather->pressureMB );
  $DetailedWeather->humidity = 30;
  $DetailedWeather->windDirectionDegrees = 72;
  $DetailedWeather->windDirectionLang = windDegrees2LangDirection ( $DetailedWeather->windDirectionDegrees  );
  $DetailedWeather->windSpeed = 7;
  $DailyWeather->DetailedWeather[] = $DetailedWeather;


  $City->DailyWeather[] = $DailyWeather;
  $City->save();
}
