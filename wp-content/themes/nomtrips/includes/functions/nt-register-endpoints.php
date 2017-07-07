<?php
add_action( 'rest_api_init', function () {
  register_rest_route( 'nomtrips/nomlist', '/city/(?P<cityid>\d+)/user/(?P<userid>\d+)', array(
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
        ),
      ),
  ) );
} );

function nt_nomlist_get(WP_REST_Request $request) {
  $parameters = $request->get_params();
  $current_user_id = get_current_user_id();
  $nomlist = new Nomlist($parameters['cityid'], $parameters['userid']);
  return $nomlist;
}