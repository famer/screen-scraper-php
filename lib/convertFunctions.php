<?php

function mb2torr ( $mb ) {
  return 0.75006375541921*$mb;
}

function windDegrees2LangDirection ( $degrees ) {
  if ( $degrees > 360 || $degrees < 0) 
    return false;

  switch ( true ) {
    case ( $degrees > 348.75 || $degrees <= 11.25) :
      $direction = 'N';
      break;
    case ( $degrees > 11.25 && $degrees <= 33.75) :
      $direction = 'NNE';
      break;
    case ( $degrees > 33.75 && $degrees <= 56.25) :
      $direction = 'NE';
      break;
    case ( $degrees > 56.25 && $degrees <= 78.75) :
      $direction = 'ENE';
      break;
    case ( $degrees > 78.75 && $degrees <= 101.25) :
      $direction = 'E';
      break;
    case ( $degrees > 101.25 && $degrees <= 123.75) :
      $direction = 'ESE';
      break;
    case ( $degrees > 123.75 && $degrees <= 146.25) :
      $direction = 'SE';
      break;
    case ( $degrees > 146.25 && $degrees <= 168.75) :
      $direction = 'SSE';
      break;
    case ( $degrees > 168.75 && $degrees <= 191.25) :
      $direction = 'S';
      break;
    case ( $degrees > 191.25 && $degrees <= 213.75) :
      $direction = 'SSW';
      break;
    case ( $degrees > 213.75 && $degrees <= 236.25) :
      $direction = 'SW';
      break;
    case ( $degrees > 236.25 && $degrees <= 258.75) :
      $direction = 'WSW';
      break;
    case ( $degrees > 258.75 && $degrees <= 281.25) :
      $direction = 'W';
      break;
    case ( $degrees > 281.25 && $degrees <= 303.75) :
      $direction = 'WNW';
      break;
    case ( $degrees > 303.75 && $degrees <= 326.25) :
      $direction = 'NW';
      break;
    case ( $degrees > 326.25 && $degrees <= 348.75) :
      $direction = 'NNW';
      break;
    default:
      $direction = false;
  }
  return $direction;
}
function windDegrees2LangDirectionIf ( $degrees ) {
  if ( $degrees > 360 || $degrees < 0) 
    return false;

    if ( $degrees > 348.75 || $degrees <= 11.25) {
      $direction = 'N';
    } else
    if ( $degrees > 11.25 && $degrees <= 33.75) {
      $direction = 'NNE';
    } else
    if ( $degrees > 33.75 && $degrees <= 56.25) {
      $direction = 'NE';
    } else
    if ( $degrees > 56.25 && $degrees <= 78.75) {
      $direction = 'ENE';
    } else
    if ( $degrees > 78.75 && $degrees <= 101.25) {
      $direction = 'E';
    } else
    if ( $degrees > 101.25 && $degrees <= 123.75) {
      $direction = 'ESE';
    } else
    if ( $degrees > 123.75 && $degrees <= 146.25) {
      $direction = 'SE';
    } else
    if ( $degrees > 146.25 && $degrees <= 168.75) {
      $direction = 'SSE';
    } else
    if ( $degrees > 168.75 && $degrees <= 191.25) {
      $direction = 'S';
    } else
    if ( $degrees > 191.25 && $degrees <= 213.75) {
      $direction = 'SSW';
    } else
    if ( $degrees > 213.75 && $degrees <= 236.25) {
      $direction = 'SW';
    } else
    if ( $degrees > 236.25 && $degrees <= 258.75) {
      $direction = 'WSW';
    } else
    if ( $degrees > 258.75 && $degrees <= 281.25) {
      $direction = 'W';
    } else
    if ( $degrees > 281.25 && $degrees <= 303.75) {
      $direction = 'WNW';
    } else
    if ( $degrees > 303.75 && $degrees <= 326.25) {
      $direction = 'NW';
    } else
    if ( $degrees > 326.25 && $degrees <= 348.75) {
      $direction = 'NNW';
    } else
      $direction = false;
  return $direction;
}
