<?php

include '../config/bootstrap.php';
Doctrine::loadModels('../models');

$City = new City();
$City->name = 'Nizhniiy Novgorod';
$City->gid = 520555;
$City->save();
