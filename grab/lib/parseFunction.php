<?php
function getDom($path) {
  $tidy = tidy_parse_file($path, array("numeric-entities" => true, "output-xhtml" => true), 'utf8');
  $tidy->cleanRepair();
  $xhtml = (string) $tidy;
  $dom = simplexml_load_string($xhtml);
  $dom->registerXPathNamespace("xhtml", "http://www.w3.org/1999/xhtml");
  unset($xhtml);
  return $dom;
}

function getDayWeather( $gid = 0 ) {
  if ( !$gid ) 
    return false;

  $dayWeather = array();

  $Dom = getDom(getDetailedWeatherFile($gid));
  $trs = $Dom->xpath('//xhtml:table[@class="forecast_table"]/xhtml:tr[(position()-1) mod 2 = 0]');
  // Extracting date
  $date = $Dom->xpath('//xhtml:div[@class="pager_blue"]');
  preg_match( '/\/a>.{2}(.+).{2}<a/', $date[0]->asXML(), $matches );

  $date = strtotime ( $matches[1] );
  $date = date('Y-m-d', $date);

  // Removing table's head
  array_shift($trs);
  foreach ( $trs as $w ) {
    $arr = array();
    $arr[time] = trim($w->td[0]);
    $arr[temperature] = floatval($w->td[1]);
    $arr[windDirection] = intval($w->td[3]);
    $arr[windSpeed] = intval($w->td[4]);
    $arr[cloud] = intval($w->td[5]);
    $arr[precipitation] = intval($w->td[6]);
    $arr[humidity] = intval($w->td[7]);
    $arr[pressureMB] = floatval($w->td[8]);
    $arr[graph] = reset(explode('.', trim ( basename ($w->td[9]->img->attributes()->src ) ) ) );
    $arr[description] = trim($w->td[10]);
    $arr[date] = $date;
    $dayWeather[] = $arr;
  }
  unset($Dom, $trs, $arr);
  return $dayWeather;
}
// Returns string from local file(if any) or http. In last case saves to file for future purposes
function getDetailedWeatherFile($gid) {
  $path = 'detailed_weather/';
  $weatherFile = $gid.".html";
  if (!file_exists($path.$weatherFile)) 
  {
    // TODO: remove
    sleep(1);
    $html = file_get_contents('http://freemeteo.com/default.asp?pid=19&la=1&gid='.$gid.'&nDate=1');
    $fh = fopen($path.$weatherFile, 'w') or die("can't open file");
    fwrite($fh, $html);
    fclose($fh);
  }else echo 'bang';
  return $path.$weatherFile;
}
