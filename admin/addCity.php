<?php
include '../config/bootstrap.php';
Doctrine::loadModels('../models');

if ( $_GET['city_id'] && !$_POST ) {
  $City = Doctrine::getTable('City')->find( intval ($_GET['city_id']) );
}
if ( $_POST ) {
  function fixPOST (&$element, $key) {
    $element = stripslashes(trim($element));
  }

  array_walk ( $_POST, 'fixPOST');

  //TODO: Validator checks
  if ( !$_POST['name'] ) {
    $warnings[] = 'No name';
  }
  if ( !$_POST['geName'] ) {
    $warnings[] = 'No GE name';
  }
  if ( !$_POST['parseUrl'] ) {
    $warnings[] = 'No url';
  }

  if ( !$_POST['city_id'] || !($City = Doctrine::getTable('City')->find($_POST['city_id'])) ) {
    $City = new City();
  }

  $City->name = $_POST['name'];
  $City->geName = $_POST['geName'];
  $City->parseUrl = $_POST['parseUrl'];
  $City->isVacation = $_POST['isVacation'];
  parse_str($City->parseUrl, $output);
  /*
  if ( !($Country = Doctrine::getTable('Country')->find($_POST['countr_id'])) ) {
    $Country = new Country();
    $Country->name = $_POST['name'];
    $Country->geName = $_POST['geName'];
  }

  $City->Country = $Country;
   */
  $City->gid = $_POST['gid'] ? $_POST['gid'] : $output['gid'];
  if ( !$warnings ) {
    $City->save();
  } else {
    echo 'There was troubles till saving your input. Try fo fix it and save again<br />';
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Admin: Add City</title>
    <!--link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset/reset-min.css"/-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head> 
 
<body> 
   
  <a href="index.php">City List</a>
  <form method="post">
    City name: <input type="text" name="name" value="<?=$City->engName?>" />
    <br />
    City ge name: <input type="text" name="geName" value="<?=$City->geName?>" />
    <br />
    City gid: <input type="text" name="gid" value="<?=$City->gid?>" />
    <br />
    Or
    <br />
    Freemeteo url: <input type="text" name="parseUrl" value="<?=$City->parseUrl?>" />
    <br />
    Vacation: <input type="checkbox" name="isVacation" value="1" <?=($City->isVacation ? 'checked="checked"' : '')?> />
    <br />
    <input type="hidden" name="city_id" value="<?=$City->id?>" />
    <input type="submit" value="save" />
  </form>
</body> 
</html> 
