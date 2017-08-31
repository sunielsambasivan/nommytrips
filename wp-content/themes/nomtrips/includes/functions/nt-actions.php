<?php
/**
  * Actions and filters
**/

/**
 * apply tags to attachments
**/
function nt_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'nt_add_tags_to_attachments' );

/**
 * rewrite url filter restaurants, put city name in front
*/
function restaurant_permalink($permalink, $post_id, $leavename) {
  if (strpos($permalink, '%city%') === FALSE) return $permalink;
    // Get post
    $post = get_post($post_id);
    if (!$post) return $permalink;

    // Get taxonomy terms
    $terms = wp_get_object_terms($post->ID, 'city');
    if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
      $taxonomy_slug = $terms[0]->slug;
    else $taxonomy_slug = 'no-city';

  return str_replace('%city%', $taxonomy_slug, $permalink);
}
add_filter('post_link', 'restaurant_permalink', 1, 3);
add_filter('post_type_link', 'restaurant_permalink', 1, 3);
