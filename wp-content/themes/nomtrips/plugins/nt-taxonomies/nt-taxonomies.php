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

/**
Declare City
*/

$capabilities = array (
  'assign_terms' => 'edit_restaurant'
);

//Taxonomy: city
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

$city = new Custom_Taxonomy( 'City', array('restaurant'), $args, $capabilities, $labels );