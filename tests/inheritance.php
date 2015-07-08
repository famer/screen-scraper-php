
<?php

include '../config/bootstrap.php';
include '../lib/convertFunctions.php';

Doctrine::loadModels('../models');

$id = 3;
if (!($DailyWeather = Doctrine_Core::getTable('DailyWeather')->find($id))) {
  die('No such city');
}
echo '<pre>';
print_r ( $DailyWeather->NightWeather->toArray(true));

$gid = 611717; $nDate = 1;
$url = 'http://freemeteo.com/default.asp?pid=19&la=1&gid='.$gid.'&nDate='.$nDate;

$pageString = file_get_contents ( $url );
$weathers = array();
$weathers[] = new DailyWeather();
$weathers[] = new NightWeather();
$weathers[] = new MorningWeather();
$weathers[] = new DayWeather();
$weathers[] = new EveningWeather();
foreach ($weathers as $weather) {
  $weather->loadFromString($pageString);
  print_r( $weather->toArray());
}

