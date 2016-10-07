<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Restaurant Template
 *
 * @file           restaurant.php
 * @package        NomTrips
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header(); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="row">
      <div class="content columns small-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!--breadcrumb section-->
        <div class="breadcrumb">
          <span class="breadcrumb--item"><a href="#">Home</a></span>
          <span class="breadcrumb--divider">></span>
          <span class="breadcrumb--item"><a href="#">Restaurants</a></span>
          <span class="breadcrumb--divider">></span>
          <span class="breadcrumb--item"><a href="#">New York City</a></span>
          <span class="breadcrumb--divider">></span>
          <span class="breadcrumb--item">Joey's</span>
        </div>

        <!--heading section-->
        <section class="row content--heading--restaurant">
          <h1 class="columns content--heading--title"><?php the_title(); ?></h1>

          <div class="columns indicator-likes--sm">5</div>

          <div class="columns star-rating">
            <i class="star-rating--star fa fa-star-o"></i>
            <i class="star-rating--star fa fa-star-o"></i>
            <i class="star-rating--star fa fa-star-o"></i>
            <i class="star-rating--star fa fa-star-o"></i>
          </div>
        </section>

        <!--post content section-->
        <div class="row">
          <section class="columns small-12 post-content">
            <?php the_content(); ?>
          </section><!-- end of .post-entry -->
        </div><!--end of row-->

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
        </div><!--end of row-->

        <!--restaurant details section-->
        <div class="row">

          <!--left col-->
          <section class="columns small-12 medium-3">

          </section>

          <!--middle col-->
          <section class="columns small-12 medium-6">

          </section>

          <!--right col-->
          <section class="columns small-12 medium-3">

          </section>

        </div><!--end of row-->

      </div><!-- end of #post-<?php the_ID(); ?> -->
    </div><!--end of row-->
    <?php comments_template( '', true );

  endwhile;

else :

  echo 'no content';

endif; ?>

<?php get_footer(); ?>
