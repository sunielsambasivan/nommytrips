<?php

/*
Declare fields for restaurant content type
*/

add_action( 'custom_metadata_manager_init_metadata', function() {

  $post_types = array( 'nomlist' );

  $nl_form = new Custom_Metadata_Form( 'nomlist-form', $post_types );

  $nl_form->set_form_item( array(
    'name' => 'nt_cpt_nomlist_info',
    'item_type' => 'metabox',
    'fields' => array(
      'label' => 'Nomlist Info',
      )
  ) );

  $nl_form->set_form_item( array(
    'name' => 'nt_cpt_nomlist_city',
    'item_type' => 'field',
    'fields' => array(
      'group' => 'nt_cpt_nomlist_info',
      'field_type' => 'taxonomy_select',
      'taxonomy' => 'city',
      'label' => 'Nomlist City',
    )
  ) );

  $nl_form->print_form();
});