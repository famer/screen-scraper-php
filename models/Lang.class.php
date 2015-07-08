<?php

class Lang {

  // Translates description from english to georgian
  public function engToGeDescription ( $eng = NULL ) {
    if ( !$eng ) return false;

    $dict = array();

    $dict['Chance of rain'] = 'მოსალოდნელია წვიმა';
    $dict['Chance of rain or sleet'] = 'მოსალოდნელია წვიმა ან სველი თოვლი';
    $dict['Chance of sleet or snow'] = 'მოსალოდნელია თოვლჭყაპი ან თოვლი';
    $dict['Chance of snow'] = 'უღრუბლო ამინდი';
    $dict['Clear weather'] = 'უღრუბლო ამინდი';
    $dict['Cloudy skies'] = 'ღრუბლიანი ცა';
    $dict['Few clouds'] = 'მცირედი ღრუბელი';
    $dict['Heavy rain'] = 'ძლიერი წვიმა';
    $dict['Heavy rain or sleet'] = 'ძლიერი წვიმა ან თოვლჭყაპი';
    $dict['Heavy sleet or snow'] = 'ძლიერი თოვლჭყაპი ან თოვლი';
    $dict['Light rain'] = 'მცირედი წვიმა';
    $dict['Light rain or sleet'] = 'მცირედი წვიმა ან თოვლჭყაპი';
    $dict['Light sleet or snow'] = 'მცირედი თოვლჭყაპი ან თოვლი';
    $dict['Light snow'] = 'მცირედი თოვლი';
    $dict['Partly cloudy skies'] = 'ნაწილობრივ ღრუბლიანი ცა';
    $dict['Rain'] = 'წვიმა';
    $dict['Rain and possible heavy thunderstorm'] = 'წვიმა, მოსალოდნელია ძლიერი ჭექა-ქუხილი';
    $dict['Rain and possible thunder'] = 'წვიდა და ჭექა-ქუხილი';
    $dict['Rain or sleet'] = 'წვიმა ან თოვლჭყაპი';
    $dict['Rain or sleet and possible heavy thunder'] = 'წვიმა ან თოვლჭყაპი და შესაძლებელია ჭექა-ქუხილი';
    $dict['Sleet or snow'] = 'თოვლჭყაპი ან თოვლი';
    $dict['Snow'] = 'თოვლი';


    return $dict[trim($eng)];
  }

  // Wind direction english to georian translate
  public function engToGeWindDirectionLang ( $eng ) {
    if ( !$eng ) return false;

    $dict = array();

    $dict['N'] = 'ჩ';
    $dict['NNE'] = 'ჩჩა';
    $dict['NE'] = 'ჩა';
    $dict['ENE'] = 'აჩა';
    $dict['E'] = 'ა';
    $dict['ESE'] = 'ასა';
    $dict['SE'] = 'სა';
    $dict['SSE'] = 'სსა';
    $dict['S'] = 'ს';
    $dict['SSW'] = 'სსდ';
    $dict['SW'] = 'სდ';
    $dict['WSW'] = 'დსდ';
    $dict['W'] = 'დ';
    $dict['WNW'] = 'დჩდ';
    $dict['NW'] = 'ჩდ';
    $dict['NNW'] = 'ჩჩდ';

    return $dict[trim($eng)];
  }

  // Days of week
  public function engToGeDayOfWeek ( $eng ) {
    if ( !$eng ) return false;

    $dict = array();

    $dict['Mon'] = 'ორშ';
    $dict['Tue'] = 'სამ';
    $dict['Wed'] = 'ოთხ';
    $dict['Thu'] = 'ხუთ';
    $dict['Fri'] = 'პარ';
    $dict['Sat'] = 'შაბ';
    $dict['Sun'] = 'კვ';

    return $dict[trim($eng)];
  }

  // Mounthes
  public function engToGeMounth ( $eng ) {
    if ( !$eng ) return false;

    $dict = array();
    $dict['January'] = 'იანვარი';
    $dict['February'] = 'თებერვალი';
    $dict['March'] = 'მარტი';
    $dict['April'] = 'აპრილი';
    $dict['May'] = 'მაისი';
    $dict['June'] = 'ივნისი';
    $dict['July'] = 'ივლისი';
    $dict['August'] = 'აგვისტო';
    $dict['September'] = 'სექტემბერი';
    $dict['October'] = 'ოქტომბერი';
    $dict['November'] = 'ნოემბერი';
    $dict['December'] = 'დეკემბერი';

    return $dict[trim($eng)];
  }

}
