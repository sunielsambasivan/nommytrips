<?php
/**
 * Description: Nomlist is a list of restaurants that a user has flagged in a particular city
*/

class Nomlist
{
  public $nomlist_id;
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
      $this->user_id = $user_id;
    }

    $valid_user = $this->is_user_valid();
    if($valid_user) {      
      $this->createNomlist();
    } else {
      $this->error = 'Invalid User';
      throw new Exception($this->error);
    }
  }
  
  /**
    * create nomlist in db
  **/
  private function createNomlist() {
    //adds to db if not user doesnt already have a nomlist for city
    global $wpdb;
    $sql = "Select * 
    From nt_nomlists 
    Where city_id = %d 
    And user_id = %d";
    $nomlists = $wpdb->get_results( $wpdb->prepare($sql, $this->city_id, $this->user_id ));
    if($nomlists) {
      $this->restaurant_list = $this->get_nomlist();
    }
    else {
      //insert record
      $nomlist = $wpdb->insert( 
	    'nt_nomlists', 
        array( 
          'city_id' => $this->city_id, 
          'user_id' => $this->user_id 
        ), 
        array( 
          '%d', 
          '%d' 
        ) 
      );

      if(!$nomlist) {
        $this->error = 'Couldnt save nomlist';
        throw new Exception($this->error);
      } 
    }
  }

  /**
    * delete nomlist in db
  **/
  private function deleteNomlist() {

  }

  /**
    * save restaurant to nomlist in db
  **/
  private function addRestaurantToNomlist($rest_id) {
    global $wpdb;
    $sql = "
    INSERT into nt_nomlist_item
    (user_id, restaurant_id)
    VALUES ()";
  }

  /**
    * delete restaurant from nomlist in db
  **/
  private function removeRestaurantFromNomlist($rest_id) {

  }

  private function is_user_valid() {
    $user = get_user_by('ID', $this->user_id);

    if(!$user) {
      return 0;
    } else {
      return 1;
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

  public function getNomlistID($user_id = false, $city_id = false) {
    $city_id = !$city_id ? $this->city_id : $city_id;
    $user_id = !$user_id ? $this->user_id : $user_id;
    
    if($city_id && $user_id) {
      global $wpdb;
      $select = "
        Select nomlist_id 
        From nt_nomlists
        Where city_id = %d
        AND user_id = %d";
      $nomlist_id = $wpdb->get_row( $wpdb->prepare($select, $this->city_id, $this->user_id ) );      
      $this->nomlist_id = $nomlist_id;      
    } 
    else {
      $this->nomlist_id = null;
      $this->error = 'Couldnt Find nomlist id';
    }

    return $nomlist_id;
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