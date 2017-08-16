<?php
/*
  Plugin Name: NomTrips Itinerary CPT
  Plugin URI:
  Description: Itinerary for user
  Version: 1.0
  Author: Suniel Sambasivan
  Author URI:
  License: GPL2
*/

//uncomment to refresh perms and permalink rules
/* add_action( 'init', function() {
  flush_rewrite_rules();
  global $wp_post_types;
    if ( isset( $wp_post_types[ 'itinerary' ] ) ) {
      unset( $wp_post_types[ 'itinerary' ] );
        return true;
    }
    return false;
}, 0 ); */

require_once( 'nt-itinerary-fields.php' );

global $wp_roles; 

/**
Declare Itinerary custom content type
*/

$labels = array(
  'singular_name'      => _x( 'Itinerary', 'itinerary' ),
  'add_new'            => _x( 'Add New', 'itinerary' ),
  'add_new_item'       => __( 'Add Itinerary' ),
  'edit_item'          => __( 'Edit Itinerary' ),
  'new_item'           => __( 'New Itinerary' ),
  'all_items'          => __( 'All Itineraries' ),
  'view_item'          => __( 'View Itinerary' ),
  'search_items'       => __( 'Search Itinerary types' ),
  'not_found'          => __( 'No Itinerary found' ),
  'not_found_in_trash' => __( 'No Itinerary found in the Trash' ),
);

$capabilities = array(
  'edit_post'		 => "edit_itinerary",
	'read_post'		 => "read_itinerary",
	'delete_post	'	 => "delete_itinerary",
  'edit_posts' => 'edit_itineraries',
  'edit_others_posts' => 'edit_others_itineraries',
  'publish_posts' => 'publish_itineraries',
  'read_private_posts' => 'read_private_itineraries',
  'read' => 'read',
  'delete_posts' => 'delete_itineraries',
  'delete_private_posts' => 'delete_private_itineraries',
  'delete_published_posts' => 'delete_published_itineraries',
  'delete_others_posts' => 'delete_others_itineraries',
  'edit_private_posts' => 'edit_private_itineraries',
  'edit_published_posts' => 'edit_published_itineraries',
  'create_posts' => 'create_itineraries',
);

$roles = array(
  'administrator',
  'editor',
  'author',
  'subscriber'
);

$permissions = array(
  'edit_itinerary',
  'read_itinerary',
  'delete_itinerary',
  'edit_itineraries',
  'edit_others_itineraries',
  'publish_itineraries',
  'read_private_itineraries',
  'read',
  'delete_itineraries',
	'delete_private_itineraries',
	'delete_published_itineraries',
	'delete_others_itineraries',
	'edit_private_itineraries',
	'edit_published_itineraries',
	'create_itineraries'
);

$args = array(
  'description'   => 'Itinerary',
  'menu_position' => 8,
  'supports'      => array( 'title', 'author'), //turns off the text-editor and the excerpts
  'has_archive'   => false,
  'rewrite' => array( 'slug' => '/%user%/itineraries/%city%', 'with_front' => false ),
  'show_in_rest' => true,
  'rest_base' => 'itinerary-api',
  'show_in_nav_menus' => false,
  'publicly_queryable' => false,
  'exclude_from_search' => true,
  'has_archive' => false,
  'capability_type' => array('itinerary', 'itineraries'),
  'map_meta_cap' => true
);

$itinerary = new Custom_Post_Type( 'Itinerary', $args, $roles, $capabilities, $permissions, $labels );

function nt_itinerary_add_theme_caps() {
  // gets the administrator role
  $admins = get_role( 'subscriber' );
  $admins->remove_cap('edit_others_itineraries');
  $admins->remove_cap('delete_others_itineraries'); 
  $admins->remove_cap('read_private_itineraries');
  $admins->remove_cap('edit_private_itineraries');
  $admins->remove_cap('delete_private_itineraries');
  $admins->remove_cap('read');
  $admins->remove_cap('read_itinerary');

}
add_action( 'admin_init', 'nt_itinerary_add_theme_caps');

/*
  register custom fields to wp-rest api
*/
/* Do later
add_action( 'rest_api_init', 'register_itinerary_fields' );
function register_itinerary_fields() {
  register_rest_field( 'itinerary', 'nt_cpt_main_ph', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
}
function nt_rest_register_field_callback( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
*/