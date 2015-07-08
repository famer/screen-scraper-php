<?php
function getDom($path) {
  $pageString = file_get_contents($path);  
  $xhtml = (string) tidy_repair_string($pageString, array("numeric-entities" => true, "output-xhtml" => true), 'utf8') ;
  $dom = simplexml_load_string($xhtml);
  $dom->registerXPathNamespace("xhtml", "http://www.w3.org/1999/xhtml");
  return $dom;
}

function getDayWeather( $gid = 0, $nDate = 1 ) {
  if ( !$gid ) 
    return false;

  $dayWeather = array();

  $Dom = getDom('http://freemeteo.com/default.asp?pid=19&la=1&gid='.$gid.'&nDate='.$nDate);
  $trs = $Dom->xpath('//xhtml:table[@class="forecast_table"]/xhtml:tr[(position()-1) mod 2 = 0]');
  // Extracting date
  $date = $Dom->xpath('//xhtml:title');
  preg_match( '/.*,(.+)-/', $date[0]->asXML(), $matches );

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
  return $dayWeather;
}
