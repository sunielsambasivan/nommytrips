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

require_once( 'nt-restaurant-fields.php' );
require_once( 'nt-restaurant-actions.php' );
require_once( 'nt-restaurant-add-buttons.php' );

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
  'rewrite' => array( 'slug' => '/restaurants/%city%', 'with_front' => false ),
  'exclude_from_search' => false,
  'show_in_rest' => true,
  'rest_base' => 'restaurant-api'
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

/*
  register custom fields to wp-rest api
*/
add_action( 'rest_api_init', 'register_restaurant_fields' );
function register_restaurant_fields() {
  register_rest_field( 'restaurant', 'nt_cpt_main_ph', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_main_email', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_website', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_main_ph', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_twitter', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_facebook', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_instagram', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_building_no', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_street', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_suite_no', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_zip', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_cost', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rating', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_menu', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_m_f', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_s_s', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_mon', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_tue', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_wed', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_thu', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_fri', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_sat', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_sun', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
  register_rest_field( 'restaurant', 'nt_cpt_rest_hrs_holidays', array('get_callback' => 'nt_rest_register_field_callback', 'update_callback' => null, 'schema' => null));
}
function nt_rest_register_field_callback( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}