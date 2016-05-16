<?php
/** Actions
**/
// apply tags to attachments
function nt_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'nt_add_tags_to_attachments' );

/*
function save_restaurant( $post_id ) {
  if( isset( $_POST ) && !empty( $_POST ) ) { 
    global $wpdb;
    $post_id = $_POST['post_ID'];
    
    //get locations for this restaurant nt_locations table
    $locations = $wpdb->get_results( $wpdb->prepare(
    "
      SELECT *
      FROM nt_locations
      WHERE
      rest_id = %s
    ", $post_id
    ) );
    
    ama_debug($locations);
    ama_debug($_POST['_x_multifield_nt_cpt_location_multifield']);
    
    $post_locations = $_POST['_x_multifield_nt_cpt_location_multifield'];
    foreach( $locations as $location ) {
      if( isset( $post_locations[$location[0]] ) ) {
        //santize variables
        $street = sanitize_text_field( $location['street'] );
        $city = sanitize_text_field( $location['city'] );
        $postal = sanitize_text_field( $location['postal'] );
        $phone = sanitize_text_field( $location['phone'] );
        $email = sanitize_email( $location['email'] );
        
        $wpdb->update(
          $wpdb->prepare(
          "
            UPDATE nt_locations
            SET 
            street = $street,
            city = $city,
            postal = $postal,
            phone = $phone,
            email = $email
            WHERE 
            rest_id = %s AND
            order = %s
          ", 
          )
        );
      }
    }
    
  }
}

add_action( 'save_post_restaurant', 'save_restaurant' );
*/
