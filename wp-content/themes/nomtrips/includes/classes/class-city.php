<?php
/**
 * Description: city object
*/

class City 
{
  public $city_id;
  public $name;
  public $slug;
  public $term_url;
  public $description;
  public $state;
  public $image_id;
  public $map;
  public $featured;
  
  public function __construct( $id ) {
    $this->city_id = $id;
    $this->set_city_meta();
  }
  
  protected function set_city_meta() {
    $term = get_term($this->city_id, 'city');
    
    //default term params
    if($term) {
      $this->name = $term->name;
      $this->slug = $term->slug;
      $this->description = $term->description;
      $this->term_url = get_term_link( $this->city_id );
    }
    
    //custom term params via Tax-meta-Class
    global $wpdb;
    $results = $wpdb->get_results( 'SELECT meta_key, meta_value FROM wp_termmeta WHERE term_id = '. intval($this->city_id) );
    
    foreach( $results as $r ) {
      switch($r->meta_key) {
        case 'nt_state-prov':
          $this->state = isset( $r->meta_value ) ? $r->meta_value : false;
          break;
          
        case 'nt_city_img':
          $images = unserialize( $r->meta_value );
          $this->image_id = isset($images['id']) ? $images['id'] : false;
          break;
        
        case 'nt_feat_city':
          $this->featured = isset( $r->meta_value ) ? $r->meta_value : false;
      }
    }
  }
  
  public function get_city_image( $size = '' ) {
    return wp_get_attachment_image_src( $this->image_id, $size );
  }
  
  public static function get_city( $id = false ) {
    $city = false;
    
    if( $id ) {
      $city = new City( $id );
    }
    
    return $city;
  }
  
  public static function get_city_by_slug( $slug = false ) {
    $city = false;
    
    if( $slug ) {
      $term = get_term_by( 'slug', $slug, 'city' );
      $city = new City( $term->term_id );
    }
    
    return $city;
  }
  
  /**
   * return city taxonomy terms that are set as featured
 */
  public static function get_featured_cities() {
    $city_objects = array();
    //get city terms using meta_query
    $terms = get_terms( 'city', 
    array(
      'hide_empty' => false,
      'meta_query' => array(
        array(
          'key' => 'nt_feat_city',
          'value' => 'on',
          'compare' => 'like'
        )
      )
    ) );
  
    foreach( $terms as $term ) {
      $city_objects[] = new City($term->term_id);
    }
    
    return $city_objects;
  }
  
  /*public static function show_feature_cities( $page = 'home' ) {
    if( $page == 'home' ) {
      $cities = City::get_featured_cities();
      $city_obj = false;
      
      foreach( $cities as $city ) {
        $city_obj = new City($city->term_id);
        //nt_debug($city_obj->get_city_image('thumb-card'));
      }
    }
  }*/
  
}