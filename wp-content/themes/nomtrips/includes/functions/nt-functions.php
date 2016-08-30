<?php
/******
 * misc custom helper function definitions
******/

/**
 * theme supports
*/
add_theme_support( 'post-thumbnails' );

//debugging function
function nt_debug( $var ) {
  echo '<blockquote><pre>';
  $pre = print_r( $var, true );
  echo esc_html( $pre );
  echo '</pre></blockquote>';
}

/**
 * Gets cities from city taxonomy and returns an array
*/
function nt_get_cities() {
  $cities_array = get_terms( 'city' );
  $cities = array();
  foreach( $cities_array as $c ) {
    $cities[$c->slug] = $c->name;
  }
  return $cities;
}

/**
 * Return post id
 * @uses WP_Query
 * @uses get_queried_object()
 * @see get_the_ID()
 * @return int
 */
function nt_get_the_post_id() {
  if (in_the_loop()) {
       $post_id = get_the_ID();
  } else {
       global $wp_query;
       $post_id = $wp_query->get_queried_object_id();
         }
  return $post_id;
}

/**
 * return media queries from css (using default foundation mq's)
*/
function nt_media_queries() {
  $mqs = array(
    'mobile' => '0',
    'tablet' => '41em',
    'desktop' => '65em',
    'desktop-large' => '114em'
  );
  
  return $mqs;
}