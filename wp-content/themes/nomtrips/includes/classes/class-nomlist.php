<?php
/**
 * Description: Nomlist is a list of restaurants that a user has flagged in a particular city
*/

class Nomlist
{
  public $city_id;
  public $user_id;
  public $restaurant_list;
  public $is_valid_user;
  public $error;

  public function __construct( $city_id = false, $user_id = false ) {
    if(!$city_id || !$user_id) {
      $this->error = 'You need a city id and a user id';
      throw new Exception($this->error);
    }

    else {
      $this->city_id = $city_id;
    }

    //$valid_user = $this->is_user_valid();
    $valid_user = $user_id; //not validating for now
    if($valid_user > 0) {
      $this->user_id = $user_id;
      $this->is_valid_user = true;
      $this->restaurant_list = $this->get_nomlist();
    } else {
      $this->error = 'Invalid User';
      throw new Exception($this->error);
    }
  }

  /**
    * save itinerary to db
  **/
  private function saveNomlist() {

  }

  /**
    * update itinerary in db
  **/
  private function updateNomlist() {

  }

  /**
    * delete itinerary in db
  **/
  private function deleteNomlist() {

  }

  /**
    * save restaurant to itinerary in db
  **/
  private function saveRestaurantToNomlist() {

  }

  /**
    * delete restaurant from itinerary in db
  **/
  private function deleteRestaurantFromNomlist() {

  }

  private function is_user_valid() {
    $user_id = get_current_user_id();
    if($user_id == 0) {
      return 0;
    } else {
      return $user_id;
    }
  }

  private function add_to_nomlist( $rest_id) {
    if( $rest_id ) {
        $restaurant = new Restaurant( $rest_id );
        $this->restaurant_list[] = $restaurant;
        $this->saveRestaurantToItinerary();
    }
    else {
      $this->error = 'Restaurant ID missing';
      throw new Exception($this->error);
    }
  }

  public function get_nomlist() {
    /**
    * gets list of restaurants in city that a user has added
    **/
    //array of objects
    $nomlist = array();
    global $wpdb;

    //dbquery/post query...
    $select = "
      SELECT
      a.restaurant_id as RestaurantID,
      c.post_name as RestaurantName,
      b.city_id as CityID,
      d.slug as CityName
      FROM nt_nomlist_item a
      INNER JOIN nt_nomlists b ON a.nomlist_id = b.nomlist_id
      INNER JOIN wp_posts c ON a.restaurant_id = c.ID
      INNER JOIN wp_terms d ON b.city_id = d.term_id
      WHERE
      b.user_id = %d AND
      b.city_id = %d";
    $nomlist = $wpdb->get_results( $wpdb->prepare($select, $this->user_id, $this->city_id ) );
    return $nomlist;
  }

  //Get cities for user where there's a nomlist
  public static function get_city_list($user_id = false) {
    if(!$user_id){
      $user_id = is_user_valid();
    }

    if($user_id > 0) {
      global $wpdb;
      $select = "
        SELECT a.city_id as CityID,
        b.name as CityName FROM nt_nomlists a
        INNER JOIN wp_terms b ON b.term_id = a.city_id
        WHERE a.user_id = %d";

      $cities = $wpdb->get_results( $wpdb->prepare($select, $user_id) );
      return $cities;
    }

    else {
      return 0;
    }
  }


}