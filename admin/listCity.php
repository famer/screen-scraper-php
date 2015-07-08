<?php

include '../config/bootstrap.php';
Doctrine::loadModels('../models');
//include './addCity.php';
$Cities = Doctrine_Core::getTable('City')->getByAlphabet();
?>
<a href="addCity.php">Add City</a>
<br />
<table>
<thead>
<tr><th>City</th><th>City (Ge name)</th><th>Edit</th><th>Remove</th></tr>
</thead>
</thead>
<tbody>
<?php
foreach ( $Cities as $City ) {
  printf ('<tr><td>%s</td><td>%s</td><td><a href="addCity.php?city_id=%d">E</a></td><td><a href="remove.php?city_id=%d">X</a></td></tr>', $City->name, $City->geName, $City->id, $City->id );
}
?>
</tbody>
</table>
