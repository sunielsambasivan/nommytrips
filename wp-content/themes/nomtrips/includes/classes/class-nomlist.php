<?php
/**
 * Description: Nomlist is a list of restaurants that a user has flagged in a particular city
*/

class Nomlist
{
  public $city_id;
  public $user_id;
  public $restaurant_list;

  public function __construct( $city_id = false, $user_id = false ) {
    if(!$city_id || !$user_id) {
      $this->error = 'You need a city id and a user id';
      throw new Exception($this->error);
    }

    else {
      $this->city_id = $city_id;
      $this->user_id = $user_id;
      $this->restaurant_list = $this->get_nomlist();
    }
  }

  public function get_nomlist() {
    /**
    * gets list of restaurants in city that a user has added
    **/
    //array of objects
    $nomlist = new array();

    //dbquery/tax query
    return $nomlist;
  }

  private function add_to_nomlist($id) {
    //add a restaurant to $restaurant_list
  }
}