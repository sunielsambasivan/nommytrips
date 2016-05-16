<?php

/*
Declare fields for restaurant content type
*/

add_action( 'custom_metadata_manager_init_metadata', function() {
  
  $post_types = array( 'restaurant' );
  
  $rest_form = new Custom_Metadata_Form( 'rest-form', $post_types );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_restaurant_info', 
    'item_type' => 'metabox',
    'fields' => array(
      'label' => 'Restaurant Info', 
      )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_location_multifield',
    'item_type' => 'multifield',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'label' => 'Location(s)',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_street_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'multifield' => 'nt_cpt_location_multifield',
      'label' => 'Street Address',
    )
  ) );
  
  $cities = nt_get_cities();

  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_cities_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
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
      'group' => 'nt_cpt_restaurant_info',
      'multifield' => 'nt_cpt_location_multifield',
      'field_type' => 'text',
      'label' => 'Zip/Postal',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_ph_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'multifield' => 'nt_cpt_location_multifield',
      'field_type' => 'tel',
      'label' => 'Location Phone No.',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_email_mf',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'multifield' => 'nt_cpt_location_multifield',
      'field_type' => 'email',
      'label' => 'location email',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_cost',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'field_type' => 'select',
      'label' => 'Price Category',
      'values' => array(
        1 => '$',
        2 => '$$',
        3 => '$$$',
        4 => '$$$$',
      )
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rating',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'field_type' => 'select',
      'label' => 'Rating',
      'values' => array(
        1 => '1',
        1.5 => '1.5',
        2 => '2',
        2.5 => '2.5',
        3 => '3',
        3.5 => '3.5',
        4 => '4',
        4.5 => '4.5',
        5 => '5'
      )
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_menu', 
    'item_type' => 'metabox',
    'fields' => array(
      'label' => 'Menu', 
      )
  ) );

  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_menu_wysiwyg',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_rest_menu',
      'field_type' => 'wysiwyg',
      'label' => 'Enter Menu',
    )
  ) );

  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_restaurant_hours', 
    'item_type' => 'metabox',
    'fields' => array(
      'label' => 'Hours of Operation', 
      )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_m_f',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Mon-Fri',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_s_s',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Sat-Sun',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_all',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'All Day',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_mon',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Mon',
      'desc' => 'Set specific hours for this day if it varies'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_tue',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Tue',
      'desc' => 'Set specific hours for this day if it varies'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_wed',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Wed',
      'desc' => 'Set specific hours for this day if it varies'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_thu',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Thu',
      'desc' => 'Set specific hours for this day if it varies'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_fri',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Fri',
      'desc' => 'Set specific hours for this day if it varies'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_sat',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Sat',
      'desc' => 'Set specific hours for this day if it varies'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_sun',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Sun',
      'desc' => 'Set specific hours for this day if it varies'
    )
  ) );
  
  $rest_form->print_form();
});