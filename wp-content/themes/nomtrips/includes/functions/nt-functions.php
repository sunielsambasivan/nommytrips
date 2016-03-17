<?php
/**
misc custom function definitions
**/

//debugging function
function ama_debug( $var ) {
  echo '<blockquote><pre>';
  $pre = print_r( $var, true );
  echo esc_html( $pre );
  echo '</pre></blockquote>';
}

function nt_get_cities() {
  $cities_array = get_terms( 'city' );
  $cities = array();
  foreach( $cities_array as $c ) {
    $cities[$c->slug] = $c->name;
  }
  return $cities;
}