<?php

$cityId = $_GET['city_id'] ? intval ($_GET['city_id']) : NULL;

if (!$cityId)
  die('Wrong city');

include '../config/bootstrap.php';
Doctrine::loadModels('../models');

if ($City = Doctrine::getTable('City')->find($cityId) ) {
  $City->delete() && header("Location: index.php");
} else {
  echo 'Failed to remove';
}
