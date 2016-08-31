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
        
        <div class="section--heading">
          <h2><?php the_title() ?></h2>
          <a class="button small green">New Itinerary</a>
        </div>
        
        <div class="card--list-select">
          <div class="card--list-select--item">
            <div class="card--list-select--title">
            Food Trip to New WestMinster
            </div>
          </div>
          
          <div class="card--list-select--item">
            <div class="card--list-select--title">
            Food Trip to New WestMinster
            </div>
          </div>
          
          <div class="card--list-select--item">
            <div class="card--list-select--title">
            Food Trip to New WestMinster
            </div>
          </div>
        </div>
        <!--/card--list-select-->
        
        <div class="paging">
          <ul class="pagination text-right" role="navigation" aria-label="Pagination">
            <li class="pagination-previous"><a href="#" class="fa fa-chevron-left" aria-label="Prev page"></a></li>
            <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
            <li><a href="#" aria-label="Page 2">2</a></li>
            <li><a href="#" aria-label="Page 3">3</a></li>
            <li><a href="#" aria-label="Page 4">4</a></li>
            <li class="ellipsis"></li>
            <li><a href="#" aria-label="Page 12">12</a></li>
            <li><a href="#" aria-label="Page 13">13</a></li>
            <li class="pagination-next"><a href="#" class="fa fa-chevron-right" aria-label="Next page"></a></li>
          </ul>
        </div>
      </div>
   </div>
  </div>

  <div class="content columns small-12 medium-5 large-3">
    <div class="card--list-trips">
      <div class="card--list-trips--item">
        <div class="card--list-trips--image">
          <?php $imgsrc = wp_get_attachment_url( 99, 'thumb-food-sq' ); nt_debug($imgsrc); ?>
          <img src="<?php //echo esc_url($imgsrc); ?>" />
        </div>
        <div class="card--list-trips--details"></div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
      
<?php get_footer(); ?>
