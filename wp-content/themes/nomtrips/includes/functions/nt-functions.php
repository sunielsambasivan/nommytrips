<?php
/**
misc custom function definitions
**/

//debuging function
function ama_debug( $var ){
  echo '<blockquote><pre>';
  $pre = print_r( $var, true );
  echo esc_html( $pre );
  echo '</pre></blockquote>';
}