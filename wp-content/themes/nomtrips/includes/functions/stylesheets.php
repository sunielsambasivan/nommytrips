<?php
/*Enqueue Stylesheets*/

if ( !is_admin() )
  add_action( 'wp_enqueue_scripts', 'nt_add_stylesheets' );

function ama_add_stylesheets() {
  //foundation
  wp_register_style( 'foundation', get_stylesheet_directory_uri() . '/styles/foundation/css/app.css');
  wp_enqueue_style( 'foundation' );
  
  //nomtrip styles
  wp_register_style( 'nomtrips-css', get_stylesheet_directory_uri() . '/styles/nomtrips/css/site.css');
  wp_enqueue_style( 'nomtrips-css' );
  
}