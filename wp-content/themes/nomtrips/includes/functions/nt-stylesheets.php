<?php
/*Enqueue Stylesheets*/

if ( !is_admin() )
  add_action( 'wp_enqueue_scripts', 'nt_add_stylesheets' );

function nt_add_stylesheets() {

  //foundation motion ui (http://zurb.com/playground/motion-ui)
  wp_register_style( 'motion-ui', get_stylesheet_directory_uri() . '/styles/vendor/foundation/motion-ui.min.css');
  wp_enqueue_style( 'motion-ui' );

  //nomtrip styles
  wp_register_style( 'nomtrips-css', get_stylesheet_directory_uri() . '/styles/site.css');
  wp_enqueue_style( 'nomtrips-css' );
}
