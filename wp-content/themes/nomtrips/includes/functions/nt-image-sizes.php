<?php

/**
  Image size definitions
**/

add_action( 'after_setup_theme', 'nt_image_sizes_init' );
function nt_image_sizes_init() {
  
  //banners
  add_image_size( 'banner-xlarge', 1920 );    //large desktop
  add_image_size( 'banner-large', 1440 );     //normal desktop
  add_image_size( 'banner-medium', 1024 );    //tablet
  add_image_size( 'banner-small', 640 );      //mobile
  
  //thumbs/cards
  add_image_size( 'thumb-card', 610 );        //images for cards
  add_image_size( 'thumb-card-vert', 768, 805, true ); //images for cards (vertical)
  add_image_size( 'thumb-nomtrips', 120 );    //food images for nom-trips list (circles)
  add_image_size( 'thumb-nomtrips', 150 );    //profile images (circles)
  add_image_size( 'thumb-food', 260 );        //food review thumb
  add_image_size( 'thumb-food-sq', 260, 260, true );  //food review thumb
  add_image_size( 'thumb-rest', 180 );        //restaurant page food thumbs
}

/** 
  make images sizes available in admin pages
**/

add_filter( 'image_size_names_choose', 'nt_custom_sizes_choose' );
function nt_custom_sizes_choose( $sizes ) {
  return array_merge( $sizes, array(
    'banner-xlarge'   => __( 'large desktop' ),
    'banner-large'    => __( 'normal desktop' ),
    'banner-medium'   => __( 'tablet' ),
    'banner-small'    => __( 'mobile' ),
    'thumb-card'      => __( 'images for cards' ),
    'thumb-nomtrips'  => __( 'food images for nom-trips list (circles)' ),
    'thumb-nomtrips'  => __( 'profile images (circles)' ),
    'thumb-food'      => __( 'food review thumb' ),
    'thumb-rest'      => __( 'restaurant page food thumbs' )
  ) );
}

/**
  Helpers
**/
