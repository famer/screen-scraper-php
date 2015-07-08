<?php
include '../config/bootstrap.php';
Doctrine::loadModels('../models');
Doctrine_Core::dumpData('data.yml');
