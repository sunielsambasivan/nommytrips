<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Template: single post
 * Description: a blog, review, dish
 * @file           single-post.php
 * @package        NomtTrips
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header(); ?>

<?php

/**
  * get post objects
**/
$nt_post = new Nomtrip_Post();
$restaurant_id = !empty( $nt_post->get_post_restaurant() ) ? $nt_post->get_post_restaurant()[0] : false;
$restaurant = $restaurant_id ? new Restaurant( $restaurant_id ) : false;
//nt_debug($restaurant);

/**
  * different types of posts (use later)
**/
$review_page = in_category('review');
$dish_page = in_category('dish');
$blog_page = in_category('blog');
?>

<div class="row" id="<?php echo esc_attr( $nt_post->slug ); ?>">

  <!--main content section-->
  <div class="content columns small-12 medium-7 large-9">

    <!--breadcrumb section-->
    <div class="breadcrumb">
      <span class="breadcrumb--item"><a href="#">Home</a></span>
      <span class="breadcrumb--divider">></span>
      <span class="breadcrumb--item"><a href="#">Restaurants</a></span>
      <span class="breadcrumb--divider">></span>
      <?php echo $restaurant ? '<span class="breadcrumb--item"><a href="' . get_term_link($restaurant->restaurant_location->city->term_id) . '">' . esc_html( $restaurant->restaurant_location->city->name ) . '</a></span><span class="breadcrumb--divider"> > </span>' : ''; ?>
      <?php echo $restaurant ? '<span class="breadcrumb--item"><a href="' . $restaurant->restaurant_url . '">' . esc_html( $restaurant->restaurant_name ) . '</a></span><span class="breadcrumb--divider"> > </span>' : ''; ?>
      <span class="breadcrumb--item">War on Taste, Buds</span>
    </div>

    <!--heading section-->
    <section class="row content--heading--post">
      <h1 class="columns content--heading--title"><?php the_title(); ?></h1>
      <div class="columns star-rating">
        <i class="star-rating--star fa fa-star-o"></i>
        <i class="star-rating--star fa fa-star-o"></i>
        <i class="star-rating--star fa fa-star-o"></i>
        <i class="star-rating--star fa fa-star-o"></i>
      </div>
      <div class="columns small-12 content--by-line">written by: <a href="#">vic</a> || <span class="content--date">October 20, 2016</span></div>
    </section>

    <!--post content section-->
    <div class="row">
      <section class="columns small-12 content--post">
        <?php the_content(); ?>
      </section>
    </div>

    <!--bookmark section-->
    <div class="row">
      <section class="columns small-12">
        <div class="button-bar">
          <a class="button-bar--btn fa fa-heart"></a>
          <a class="button-bar--btn fa fa-bookmark"></a>
          <a class="button-bar--btn button-bar--nt-icon">
            <span class="icon-nomtrips-logomark"></span>
            <span class="button-bar--label">Add to Trip</span>
          </a>
          <a class="button-bar--btn">
            <span class="fa fa-pencil"></span>
            <span class="button-bar--label">Write a Review</span>
          </a>
        </div>
      </section>
    </div>
    <!--end bookmark section-->

   </div>
   <!--end main column-->

   <!--sidebar content section-->
   <div class="content columns small-12 medium-5 large-3">

   </div>
   <!--end sidebar content section-->

</div>
<!--end row-->

<?php get_footer(); ?>
