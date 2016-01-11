<?php
/*
  Plugin Name: NomTrips Restaurant CPT
  Plugin URI:
  Description: Creates a custom post type for resturants
  Version: 1.0
  Author: Suniel Sambasivan
  Author URI:
  License: GPL2
*/

/**
Declare Restaurant custom content type
*/

$labels = array(
  'singular_name'      => _x( 'Restaurant', 'restaurant' ),
  'add_new'            => _x( 'Add New', 'restaurant' ),
  'add_new_item'       => __( 'Add Restaurant' ),
  'edit_item'          => __( 'Edit Restaurant' ),
  'new_item'           => __( 'New Restaurant' ),
  'all_items'          => __( 'All Restaurants' ),
  'view_item'          => __( 'View Restaurant' ),
  'search_items'       => __( 'Search Restaurant types' ),
  'not_found'          => __( 'No Restaurant found' ),
  'not_found_in_trash' => __( 'No Restaurant found in the Trash' ),
);

$capabilities = array(
  'edit_post' => 'edit_restaurant',
  'read_post' => 'read_restaurant',
  'delete_post' => 'delete_restaurant',
  'publish_post' => 'publish_restaurant'
);

$args = array(
  'description'   => 'Restaurant',
  'menu_position' => 8,
  'supports'      => array( 'title','thumbnail', 'revisions', 'editor', 'custom-fields', 'author' ), //turns off the text-editor and the excerpts
  'has_archive'   => false,
  'rewrite' => array( 'slug' => '/restaurant' ),
  'exclude_from_search' => false,
);

$roles = array( 
  'administrator', 
  'editor',
  'author',
);

$permissions = array('read');

//uncomment to refresh perms and permalink rules
/*
add_action( 'init', function() {
  flush_rewrite_rules();
  global $wp_post_types;
    if ( isset( $wp_post_types[ 'restaurant' ] ) ) {
      unset( $wp_post_types[ 'restaurant' ] );
        return true;
    }
    return false;
}, 0 );
*/

$restaurant = new Custom_Post_Type( 'Restaurant', $args, $roles, $capabilities, $permissions, $labels );