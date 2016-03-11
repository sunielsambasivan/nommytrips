<?php

/*
  Plugin Name: NomTrips Custom Taxonomies
  Plugin URI:
  Description: Creates custom taxonomies
  Version: 1.0
  Author: Suniel Sambasivan
  Author URI:
  License: GPL2
*/

require_once( 'nt-taxonomy-fields.php' );

/**
Declare City
*/

$capabilities = array (
  'assign_terms' => 'edit_restaurant'
);

 $labels = array(
   'name'              => _x( 'Cities', 'cities' ),
   'singular_name'     => _x( 'City', 'city' ),
   'search_items'      => __( 'Search Cities' ),
   'all_items'         => __( 'All Cities' ),
   'parent_item'       => __( 'Parent City' ),
   'parent_item_colon' => __( 'Parent City:' ),
   'edit_item'         => __( 'Edit City' ),
   'update_item'       => __( 'Update City' ),
   'add_new_item'      => __( 'Add New City' ),
   'new_item_name'     => __( 'New City' ),
   'menu_name'         => __( 'Cities' ),
);

$rewrite = array(
  'slug' => 'city',
  'with_front' => 'false',
  'hierarchical' => true,
);

$args = array(
  'description' => 'City',
  'rewrite' => $rewrite,
);

$city = new Custom_Taxonomy( 'City', array('restaurant', 'post'), $args, $capabilities, $labels );

/**
Declare Cuisine Type
*/

 $labels = array(
   'name'              => _x( 'Cuisines', 'cuisine' ),
   'singular_name'     => _x( 'Cuisine', 'cuisine' ),
   'search_items'      => __( 'Search Cuisines' ),
   'all_items'         => __( 'All Cuisines' ),
   'parent_item'       => __( 'Parent Cuisine' ),
   'parent_item_colon' => __( 'Parent Cuisine:' ),
   'edit_item'         => __( 'Edit Cuisine' ),
   'update_item'       => __( 'Update Cuisine' ),
   'add_new_item'      => __( 'Add New Cuisine' ),
   'new_item_name'     => __( 'New Cuisine' ),
   'menu_name'         => __( 'Cuisines' ),
);

$rewrite = array(
  'slug' => 'cuisine',
  'with_front' => 'false',
  'hierarchical' => true,
);

$args = array(
  'description' => 'Genre of food eg. Italian, Indian, Seafood, etc',
  'rewrite' => $rewrite,
);

$cuisine = new Custom_Taxonomy( 'Cuisine', array('restaurant', 'post'), $args, $capabilities, $labels );

/**
Declare Meal Type
*/

 $labels = array(
   'name'              => _x( 'Restaurant Types', 'restaurant-types' ),
   'singular_name'     => _x( 'Restaurant Type', 'restaurant-type' ),
   'search_items'      => __( 'Search Restaurant Types' ),
   'all_items'         => __( 'All Restaurant Types' ),
   'parent_item'       => __( 'Parent Restaurant Type' ),
   'parent_item_colon' => __( 'Parent Restaurant Types:' ),
   'edit_item'         => __( 'Edit Restaurant Type' ),
   'update_item'       => __( 'Update Restaurant Type' ),
   'add_new_item'      => __( 'Add New Restaurant Type' ),
   'new_item_name'     => __( 'New Restaurant Type' ),
   'menu_name'         => __( 'Restaurant Types' ),
);

$rewrite = array(
  'slug' => 'restaurant-type',
  'with_front' => 'false',
  'hierarchical' => true,
);

$args = array(
  'description' => 'Restaurant type as in Breakfast, Dinner, Pub, Fine Dining',
  'rewrite' => $rewrite,
);

$restaurant_type = new Custom_Taxonomy( 'Restaurant Type', array('restaurant', 'post'), $args, $capabilities, $labels );

/**
Neighborhood
*/

 $labels = array(
   'name'              => _x( 'Neighborhoods', 'neighborhoods' ),
   'singular_name'     => _x( 'Neighborhood', 'neighborhood' ),
   'search_items'      => __( 'Search Neighborhoods' ),
   'all_items'         => __( 'All Neighborhoods' ),
   'parent_item'       => __( 'Parent Neighborhood' ),
   'parent_item_colon' => __( 'Parent Neighborhoods:' ),
   'edit_item'         => __( 'Edit Neighborhood' ),
   'update_item'       => __( 'Update Neighborhood' ),
   'add_new_item'      => __( 'Add New Neighborhood' ),
   'new_item_name'     => __( 'New Neighborhood' ),
   'menu_name'         => __( 'Neighborhoods' ),
);

$rewrite = array(
  'slug' => 'neighborhood',
  'with_front' => 'false',
  'hierarchical' => false,
);

$args = array(
  'description' => 'Section of city locals are familiar with like burrough, ward, district, etc. example: Brooklyn, West End, Downtown, Chinatown, etc.',
  'rewrite' => $rewrite,
);

$restaurant_type = new Custom_Taxonomy( 'Neighborhood', array('restaurant'), $args, $capabilities, $labels );