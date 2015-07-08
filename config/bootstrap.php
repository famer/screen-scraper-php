<?php
/* Created at 04.11.2010
 * by Timur Tatarshaov
 */
 
require_once(dirname(__FILE__) . '/../lib/Doctrine.php');
require_once (dirname(__FILE__).'/../models/Lang.class.php');
spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine_Core', 'modelsAutoload'));
$manager = Doctrine_Manager::getInstance();
$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
$manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core::MODEL_LOADING_CONSERVATIVE);

$conn = Doctrine_Manager::connection('mysql://root:nhfrnjhn@localhost/weather_alva');
$conn->setAttribute(Doctrine_Core::ATTR_USE_NATIVE_ENUM, true);
$conn->setCharset('utf8');
mb_internal_encoding('UTF-8');
