<?php
/*
  Plugin Name: NomTrips Nomlist CPT
  Plugin URI:
  Description: Creates a list of restaurants per city per user
  Version: 1.0
  Author: Suniel Sambasivan
  Author URI:
  License: GPL2
*/

/**
Declare Nomlist custom content type
*/

$labels = array(
  'singular_name'      => _x( 'Nomlist', 'nomlist' ),
  'add_new'            => _x( 'Add New', 'nomlist' ),
  'add_new_item'       => __( 'Add Nomlist' ),
  'edit_item'          => __( 'Edit Nomlist' ),
  'new_item'           => __( 'New Nomlist' ),
  'all_items'          => __( 'All Nomlists' ),
  'view_item'          => __( 'View Nomlist' ),
  'search_items'       => __( 'Search Nomlist types' ),
  'not_found'          => __( 'No Nomlist found' ),
  'not_found_in_trash' => __( 'No Nomlist found in the Trash' ),
);

$capabilities = array(
  'edit_post' => 'edit_nomlist',
  'read_post' => 'read_nomlist',
  'delete_post' => 'delete_nomlist',
  'publish_post' => 'publish_nomlist'
);

$args = array(
  'description'   => 'Nomlist',
  'menu_position' => 8,
  'supports'      => array( 'title','thumbnail', 'revisions', 'editor', 'custom-fields', 'author' ), //turns off the text-editor and the excerpts
  'has_archive'   => false,
  'rewrite' => array( 'slug' => '/nomlists/%city%', 'with_front' => false ),
  'exclude_from_search' => false,
  'show_in_rest' => true,
  'rest_base' => 'nomlist-api'
);

$roles = array(
  'administrator',
  'editor',
  'author',
  'subscriber'
);

$permissions = array('read');

//uncomment to refresh perms and permalink rules
/*
add_action( 'init', function() {
  flush_rewrite_rules();
  global $wp_post_types;
    if ( isset( $wp_post_types[ 'nomlist' ] ) ) {
      unset( $wp_post_types[ 'nomlist' ] );
        return true;
    }
    return false;
}, 0 );
*/

$nomlist = new Custom_Post_Type( 'Nomlist', $args, $roles, $capabilities, $permissions, $labels );

/*
  register custom fields to wp-rest api
*/
/* Do later
add_action( 'rest_api_init', 'register_nomlist_fields' );
function register_nomlist_fields() {
  register_rest_field( 'nomlist', 'nt_cpt_main_ph', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
}
function nt_rest_register_field_callback( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
*/