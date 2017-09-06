<?php
/**
  * nomlists for user for city
**/
add_action( 'rest_api_init', function () {
  register_rest_route( 'nomtrips/nomlist', '/city/(?P<cityid>\d+)/user/(?P<userid>\d+)/access_token=(?P<access_token>[a-zA-Z0-9-]+)', array(
    'methods' => 'GET',
    'callback' => 'nt_nomlist_get',
    'args' => array(
        'cityid' => array(
          'validate_callback' => function($param, $request, $key) {
            return is_numeric( $param );
          }
        ),
        'userid' => array(
          'validate_callback' => function($param, $request, $key) {
            return is_numeric( $param );
          }
        )
      ),
  ) );
} );

function nt_nomlist_get(WP_REST_Request $request) {
  $parameters = $request->get_params();
  $access_token = nt_get_oauth_user_token_cookie($parameters['userid']);  
  if($access_token === $parameters['access_token']) {
    $nomlist = new Nomlist($parameters['cityid'], $parameters['userid']);
    return $nomlist;
    //return $parameters;
  } else {
    $error = new Exception("Invalid Token: You don't have access to this content.");
    return $error->message;
  }
}

/**
  * Restaurants list
**/
add_action( 'rest_api_init', function () {
  register_rest_route( 'restaurant-api/restaurant-list', '/city/(?P<cityid>\d+)', array(
    'methods' => 'GET',
    'callback' => 'nt_get_restaurant_in_city',
    'args' => array(
        'cityid' => array(
          'validate_callback' => function($param, $request, $key) {
            return is_numeric( $param );
          }
        )
      ),
  ) );
} );

function nt_get_restaurant_in_city(WP_REST_Request $request) {
  $parameters = $request->get_params();
  $term = get_term_by('id', $parameters['cityid'], 'city');
  $carousel = new Carousel( 'restaurant', 50, 'city', array($term->slug) );
  $carousel->get_posts();
  return $carousel->get_restaurant_objects();  
}