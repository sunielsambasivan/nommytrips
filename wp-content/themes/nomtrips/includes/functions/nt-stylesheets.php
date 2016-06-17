<?php
/*Enqueue Stylesheets*/

if ( !is_admin() )
  add_action( 'wp_enqueue_scripts', 'nt_add_stylesheets' );

function nt_add_stylesheets() {
  //nomtrip styles
  wp_register_style( 'nomtrips-css', get_stylesheet_directory_uri() . '/styles/site.css');
  wp_enqueue_style( 'nomtrips-css' );
  
}