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

  //Misc 3rd party
  wp_enqueue_script( 'js-sha1', NT_JS_PATH . 'vendor/jsSha1.js', array('jquery'), '', true );

  //ajax
  wp_enqueue_script( 'nt-ajax-lists', NT_JS_PATH . 'nomtrips/ajax/nt_ajax_lists.js', array('jquery'), '', true );
  wp_enqueue_script( 'nt-login-request', NT_JS_PATH . 'nomtrips/login/request.js', array('jquery'), '', true );

  //nomtrip scripts
  wp_enqueue_script( 'nt-script', NT_JS_PATH . 'nomtrips/nt_script.js', array('jquery'), '', true );

  //wp-api nonce
  wp_localize_script( 'nt-ajax-lists', 'wpApiSettings',
  array(
    'root' => esc_url_raw( rest_url() ),
    'nonce' => wp_create_nonce( 'wp_rest' ),
    'current_user_id' => get_current_user_id(),
    'success' => __( 'Positive!', 'nomtrips' ),
    'failure' => __( 'Negative', 'nomtrips' )
    )
  );


function encodeURIComponent($str) {
  $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
  return strtr(rawurlencode($str), $revert);
}

$home_url_path = parse_url(get_home_url (null,'','http'), PHP_URL_PATH );
$request_uri_path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
if (substr($request_uri_path, 0, strlen($home_url_path)) == $home_url_path) {
    $request_uri_path = substr($request_uri_path, strlen($home_url_path));
}
$base_request_uri = rawurlencode( get_home_url( null, $request_uri_path, 'http' ) );


$mt = microtime(); 
$rand = mt_rand(); 
$timestamp = time();
$oauth_nonce = wp_create_nonce($timestamp); 
$signatureBaseString = ('http://localhost:8888/nomtrips'."/oauth1/request/"."?");
$signatureBaseString .= ("oauth_consumer_key=".CLIENT_KEY."&");
$signatureBaseString .= ("oauth_signature_method=HMAC-SHA1"."&");
$signatureBaseString .= ("oauth_timestamp=".$timestamp)."&";
$signatureBaseString .= ("oauth_nonce=".$oauth_nonce."&");
$signatureBaseString .= ("oauth_version=1.0"."&");
$signature = hash_hmac('sha1', $signatureBaseString, "".CLIENT_SECRET."");
$signatureBaseString .= ("oauth_signature=".$signature);
nt_debug($base_request_uri);
wp_localize_script( 'nt-login-request', 'oauthRequest',
array(
  'oauth_consumer_key' => CLIENT_KEY,
  'oauth_token' => '',
  'oauth_signature_method' => 'HMAC-SHA1',
  'oauth_timestamp' => time(),
  'oauth_nonce' => $oauth_nonce,
  'oauth_version' => '1.0',
  'oauth_signature' => $signature,
  'base_string' => $signatureBaseString
  )
);
}


/**
* admin section
**/

if (is_admin())
  add_action( 'admin_enqueue_scripts', 'nt_add_js_admin' );

function nt_add_js_admin() {
  wp_enqueue_script( 'nt-admin-scripts', NT_JS_PATH . 'admin/nt-admin-scripts.js', array('jquery'), '', true );
}