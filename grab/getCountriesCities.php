<?php
function getDom($path) {
  //$tidy = tidy_parse_file($path, 'utf8');
  //echo $path;
  sleep(1);
  $tidy = tidy_parse_file($path, array("numeric-entities" => true, "output-xhtml" => true), 'utf8');
  $tidy->cleanRepair();
  $xhtml = (string) $tidy;
  $dom = simplexml_load_string($xhtml);
  $dom->registerXPathNamespace("xhtml", "http://www.w3.org/1999/xhtml");
  return $dom;
}
$countries = '';
$cities = '';

//$Dom = getDom('./2010-11-02-index.html');
$cityId = 0;
//$countriesC = array('AD', 'AR', 'AU', 'BE', 'BY', 'CN', 'CA', 'BR', 'EG', 'CY', 'DE', 'RU', 'IT', 'JP', 'FR', 'GB', 'AT', 'BA', 'CL', 'CU', 'EE', 'GR', 'GE', 'IN', 'JM', 'IR', 'NR', 'NO', 'KP', 'PH', 'SO', 'TH', 'TR');
$countriesC = array('GE');
$countries .= "Country:";
$cities .= "City:";
foreach ($countriesC as $i=> $code) {
  echo "#$code $i\n";
  $url = 'http://freemeteo.com/default.asp?pid=15&la=1&cn='.$code;
  $Dom = getDom($url);
  $citiesX = $Dom->xpath('//xhtml:div[@class="Mainlinkmenu_in"]/xhtml:a');
  $country = $Dom->xpath('//xhtml:div[@class="country"]');
  $countryName = trim(substr($country[0], strpos($country[0], ',')+2));

  $countries .= "
    $code:
      name: \"$countryName\"
      code: \"$code\"
      parseUrl: \"$url\"";

  foreach ($citiesX as $i=>$city) {
    parse_str($city->attributes()->href[0]);
    $cityName = str_replace("\n", ' ', $city);

    $isCapital = $i == 0 ? "true" : "";
    $cities .= "
    N$cityId:
      Country: $code
      name: \"$cityName\"
      gid: $gid
      isCapital: $isCapital
      parseUrl: \"{$city->attributes()->href[0]}\"";
    $cityId++;
  }
}
echo $countries, "\n", $cities;
