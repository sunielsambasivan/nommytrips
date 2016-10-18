<?php
/**
 * Description: creates a restaurant object by restaurant post id
*/

class Restaurant {
  public $restaurant_id;
  public $restaurant_name;
  public $restaurant_slug;
  public $restaurant_url;
  public $restaurant_city;
  public $restaurant_neighborhood;
  public $restaurant_state;
  public $restaurant_address_full;
  public $restaurant_zip;
  public $restaurant_phone;
  public $restaurant_web;
  public $restaurant_email;
  public $restaurant_twitter;
  public $restaurant_facebook;
  public $restaurant_instagram;
  public $restaurant_google;
  public $restaurant_price;
  public $restaurant_cuisines;
  public $restaurant_cuisines_string;
  public $restaurant_hours;
  public $restaurant_hours_html;
  public $restaurant_type;
  public $restaurant_type_string;
  public $restaurant_status;
  public $error;

  private $post_obj;
  private $custom_fields;

  public function __construct( $id = false, $post = false ) {

    //Check if invalid id passed or page is not a post
    if( !$id ) {
      if( !get_the_id() ) {
        $this->restaurant_id = false;
        $this->error = 'Could not retrieve post ID';
      }

      else {
        //use current post id
        $this->post_obj = get_post( get_the_id() );
        $this->restaurant_id = $this->post_obj->ID;
        $this->restaurant_status = get_post_status( $this->restaurant_id );
      }
    }

    else {
      if( !$status = get_post_status ( $id ) ) {
        $this->restaurant_id = false;
        $this->error = 'Invalid ID';
      }

      else {
        $this->post_obj = get_post( $id );
        $this->restaurant_id = $this->post_obj->ID;
        $this->restaurant_status = $status;
      }
    }

    /**
      * now get everything about this post
    **/

    if( $this->restaurant_id ) {
      //post fields
      $this->restaurant_name = $this->post_obj->post_title;
      $this->restaurant_slug = $this->post_obj->post_name;
      $this->restaurant_url = get_post_permalink($this->restaurant_id);

      //custom fields
      $this->custom_fields = get_post_custom( $this->restaurant_id );
    }

  }// end constructor
}