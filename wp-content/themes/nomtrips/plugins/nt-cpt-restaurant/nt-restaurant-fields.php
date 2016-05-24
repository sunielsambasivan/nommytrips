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
    'name' => 'nt_cpt_building_no',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'label' => 'Building No.',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_street',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'label' => 'Street Address',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_suite_no',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'label' => 'Suite No.',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_zip',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'field_type' => 'text',
      'label' => 'Zip/Postal',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_ph',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
      'field_type' => 'tel',
      'label' => 'Location Phone No.',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_email',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_info',
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
      'label' => 'All Days',
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_mon',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Mon'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_tue',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Tue'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_wed',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Wed'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_thu',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Thu'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_fri',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Fri'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_sat',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Sat'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_sun',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Sun'
    )
  ) );
  
  $rest_form->set_form_item( array(
    'name' => 'nt_cpt_rest_hrs_holidays',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_restaurant_hours',
      'label' => 'Holidays'
      )
  ) );
  
  $rest_form->print_form();
});