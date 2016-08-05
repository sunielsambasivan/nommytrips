<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Homepage Template
 * Template Name: home
 *
 * @file           home.php
 * @package        NomTrips 
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header(); ?>

<div id="content">
  <section id="banner" class="banner">
    <?php 
    //nt_debug($id); 
      if ( has_post_thumbnail()) :
        get_template_part(NT_COMPONENTS_PATH . 'layout/banner');
      endif; 
    ?>
  </section>
        
  <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <section class="post-content">
          
          <?php the_content(); ?>
        
        </section><!-- end of .post-entry -->
      </div><!-- end of #post-<?php the_ID(); ?> -->       
      
      <?php comments_template( '', true ); 
      
    endwhile; 

  else : 

    echo 'no content'; 

  endif; ?>  
      
</div><!-- end of #content -->

<?php get_footer(); ?>
