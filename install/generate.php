<?php
include '../config/bootstrap.php';
Doctrine_Core::dropDatabases();
Doctrine_Core::createDatabases();
Doctrine_Core::generateModelsFromYaml('schemas/schema.yml', '../models', array('generateTableClasses' => true));
Doctrine_Core::createTablesFromModels('../models');
Doctrine_Core::loadData('data/countries.yml');
Doctrine_Core::loadData('data/geCities.yml');
//Doctrine_Core::loadData('data/countries_cities.yml');
//Doctrine_Core::loadData('data/eng_ge_desc_dict.yml');
