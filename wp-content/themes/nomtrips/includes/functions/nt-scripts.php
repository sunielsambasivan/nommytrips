<?php

/**
* not logged in - public site
**/

if (!is_admin())
  add_action( 'wp_enqueue_scripts', 'nt_add_js' );

function nt_add_js() {
  $template_directory_uri = get_template_directory_uri();

  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'jquery-ui');

  //foundation framework js
  wp_enqueue_script( 'foundation', NT_JS_PATH . 'vendor/foundation/foundation.js', array('jquery'), '', true );
  wp_enqueue_script( 'foundation-app', NT_JS_PATH . 'vendor/foundation/app.js', array('jquery'), '', true );

  //https://github.com/scottjehl/picturefill
  wp_enqueue_script( 'picturefill', NT_JS_PATH . 'vendor/picturefill/picturefill.js', array('jquery'), '', true );

  //responsive bg images (https://github.com/M6Web/picturefill-background)
  wp_enqueue_script( 'picturefill-background', NT_JS_PATH . 'vendor/picturefill-background/picturefill-background.js', array('jquery'), '', true );

  //slick carousel
  wp_enqueue_script( 'slick', NT_JS_PATH . 'vendor/slick/slick.js', array('jquery'), '', true );
  wp_enqueue_script( 'slick-init', NT_JS_PATH . 'vendor/slick/slick-init.js', array('jquery'), '', true );
}


/**
* admin section
**/

if (is_admin())
  add_action( 'admin_enqueue_scripts', 'nt_add_js_admin' );

function nt_add_js_admin() {
  wp_enqueue_script( 'nt-admin-scripts', NT_JS_PATH . 'admin/nt-admin-scripts.js', array('jquery'), '', true );
}