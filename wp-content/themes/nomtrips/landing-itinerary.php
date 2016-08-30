<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * My Noms Template
 * Template Name: landing-itinerary
 * Description: page where a signed up user can see their profile card, nomtrips and itineraries
 * @file           index.php
 * @package        NotTrips 
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header(); ?>
        
<?php
$user = wp_get_current_user();//nt_debug($user);
$allowed_roles = array( 'editor', 'administrator', 'author', 'subscriber' );
if( $user->ID) {
  $email = $user->data->user_email;
  $user_desc = get_the_author_meta('description', $user->data->ID);
  $user_city = get_the_author_meta('nt_usr_city', $user->data->ID);
  $user_link = get_edit_user_link($user->data->ID);
}
?>

<?php
//if logged in, show their itineraries 
if( array_intersect( $allowed_roles, $user->roles ) ) { ?>
<div class="row">
  <div class="content columns small-12 medium-7 large-9">
    <div class="row">
      <div class="columns small-12 large-4">
        <div class="card--profile">
          <?php include( locate_template( NT_COMPONENTS_PATH .'profiles/profile--card.php') ); ?>
        </div><!--/card-->
      </div>
      
      <div class="columns small-12 large-8">
        <div class="card">
          <?php wp_nav_menu( array( 'container_class' => 'nav--itinerary', 'menu_class' => 'menu--itinerary', 'theme_location' => 'menu-itinerary' ) ); ?>
        </div>
      </div>
   </div>
  </div>

  <div class="columns small-12 medium-5 large-3">
   <div class="hot-nomtrips">
     hot nomtrips
   </div>
  </div>
</div>
<?php } ?>
      
<?php get_footer(); ?>
