<?php

if (!is_admin())
  add_action( 'wp_enqueue_scripts', 'nt_add_js' );

function nt_add_js() {
  $template_directory_uri = get_template_directory_uri();
  // JS at the bottom for fast page loading.
  // except for Modernizr which enables HTML5 elements & feature detects.
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui');
  wp_enqueue_script( 'foundation', NT_JS_PATH . 'vendor/foundation/foundation.js', array('jquery'), '', true );
  wp_enqueue_script( 'foundation-app', NT_JS_PATH . 'vendor/foundation/app.js', array('jquery'), '', true );
}