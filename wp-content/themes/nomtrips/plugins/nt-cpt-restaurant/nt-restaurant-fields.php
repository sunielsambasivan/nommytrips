<?php

/*
Declare fields for restaurant content type
*/

add_action( 'custom_metadata_manager_init_metadata', function() {
  
  $post_types = array( 'restaurant' );
  
  $rest_form = new Custom_Metadata_Form( 'rest-form', $post_types );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_restaurant_locations', 
    'item_type' => 'metabox',
    'fields' => array(
      'label' => 'Restaurant Info', 
      )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_location_multifield',
    'item_type' => 'multifield',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_locations',
      'label' => 'Location(s)',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_street_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_locations',
      'multifield' => 'nt_cpt_location_multifield',
      'label' => 'Street Address',
    )
  ) );
  
  $cities = nt_get_cities();

  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_cities_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_locations',
      'multifield' => 'nt_cpt_location_multifield',
      'field_type' => 'select',
      'label' => 'Choose City',
      'values' => $cities
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_zip_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_locations',
      'multifield' => 'nt_cpt_location_multifield',
      'field_type' => 'text',
      'label' => 'Zip/Postal',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_ph_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_locations',
      'multifield' => 'nt_cpt_location_multifield',
      'field_type' => 'tel',
      'label' => 'Location Phone No.',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_email_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_locations',
      'multifield' => 'nt_cpt_location_multifield',
      'field_type' => 'email',
      'label' => 'location email',
    )
  ) );
  
  $rest_form->print_form();
});