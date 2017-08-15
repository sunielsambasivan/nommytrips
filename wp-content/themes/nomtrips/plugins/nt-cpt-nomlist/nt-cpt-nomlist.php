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

//uncomment to refresh perms and permalink rules
/* add_action( 'init', function() {
  flush_rewrite_rules();
  global $wp_post_types;
    if ( isset( $wp_post_types[ 'nomlist' ] ) ) {
      unset( $wp_post_types[ 'nomlist' ] );
        return true;
    }
    return false;
}, 0 ); */

require_once( 'nt-nomlist-fields.php' );

global $wp_roles; 

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
  'edit_others_posts' => 'edit_others_nomlists',
  'delete_others_posts' => 'delete_others_nomlists'
);

$roles = array('subscriber');

$permissions = array('edit_others_nomlists', 'delete_others_nomlists');

$args = array(
  'description'   => 'Nomlist',
  'menu_position' => 8,
  'supports'      => array( 'title'), //turns off the text-editor and the excerpts
  'has_archive'   => false,
  'rewrite' => array( 'slug' => '/%user%/nomlists/%city%', 'with_front' => false ),
  'show_in_rest' => true,
  'rest_base' => 'nomlist-api',
  'show_in_nav_menus' => false,
  'publicly_queryable' => false,
  'exclude_from_search' => true,
  'has_archive' => false,
  'capability_type' => 'nomlist'
);

$nomlist = new Custom_Post_Type( 'Nomlist', $args, $roles, $capabilities, $permissions, $labels );

function nt_nomlist_add_theme_caps() {
  // gets the administrator role
  $admins = get_role( 'subscriber' );    
  $admins->remove_cap('edit_others_nomlists');
  $admins->remove_cap('delete_others_nomlists'); 
  
}
add_action( 'admin_init', 'nt_nomlist_add_theme_caps');

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