<?php
/******
 * Actions and filters for restaurant plugin
******/

/**
 * When saving blog post, add_post_meta if restaurant id is in query string
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 */
add_action( 'save_post', 'nt_save_post_meta_restaurant', 10, 3 );

function nt_save_post_meta_restaurant( $post_id, $post, $update ) {
  $post_type = get_post_type($post_id);

  if( !isset( $_GET['rid'] ) ) return;

  nt_debug($_GET['rid']);die;

  add_post_meta( $post_id, 'restaurant_review', $_GET['rid'], true ) or
    update_post_meta( $post_id, 'restaurant_review', $_GET['rid'] );

  //nt_debug($rowid); die;

}