<?php

include '../config/bootstrap.php';
Doctrine::loadModels('../models');
//include './addCity.php';
$Cities = Doctrine_Core::getTable('City')->getByAlphabet();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Admin: Cities List</title>
    <!--link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset/reset-min.css"/-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head> 
 
<body> 
<a href="addCity.php">Add City</a>
<br />
<table>
  <thead>
    <tr>
      <th>City</th>
      <th>City (Ge name)</th>
      <th>Vacation</th>
      <th>Edit</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ( $Cities as $City ) {
  printf ('<tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>
              <a href="addCity.php?city_id=%d">Edit</a>
            </td>
            <td>
              <a href="remove.php?city_id=%d">X</a>
            </td>
          </tr>', $City->engName, $City->geName, ( $City->isVacation ? '&#x2714;' : '' ), $City->id, $City->id );
}
?>
  </tbody>
</table>
</body> 
</html> 
