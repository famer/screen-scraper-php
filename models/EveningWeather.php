<?php

/**
 * EveningWeather
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class EveningWeather extends BaseEveningWeather
{
   protected $xpathTime = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[1]';
   protected $xpathTemperature = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[2]';
   protected $xpathWindDirectionDegrees = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[4]';
   protected $xpathWindSpeed = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[5]';
   protected $xpathCloud = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[6]';
   protected $xpathPrecipitation = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[7]';
   protected $xpathHumidity = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[8]';
   protected $xpathPressureMB = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[9]';
   protected $xpathGraph = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[10]/xhtml:img[1]/@src';
   protected $xpathDescription = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[11]';
   protected $xpathGeDescription = '//xhtml:table[@class="forecast_table"]/xhtml:tr[9]/xhtml:td[11]';

}
