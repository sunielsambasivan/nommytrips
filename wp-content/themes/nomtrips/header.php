<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header template
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package nomtrips
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
    echo esc_html( ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) ) ); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
  /*
   * We add some JavaScript to pages with the comment form
   * to support sites with threaded comments (when in use).
   */
  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
  /*
   * Always have wp_head() just before the closing </head>
   * tag of your theme, or you will break many plugins, which
   * generally use this hook to add elements to <head> such
   * as styles, scripts, and meta tags.
   */
  wp_head();
?>
</head>

<body <?php body_class("off-canvas-wrapper"); ?>>
<div id="container" class="off-canvas-wrapper-inner hfeed" data-off-canvas-wrapper>
  <div class="off-canvas-content" data-off-canvas-content>
  <header id="header" class="header title-bar">
    <div class="row header--contents">    
      <!--off canvas Login menu-->
      <?php get_template_part(NT_COMPONENTS_PATH . 'menus/nav', '-off-canvas'); ?>
      
      <!--Site Logo-->
      <?php 
      $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
      <<?php echo $heading_tag; ?> id="logo" class="small-9 medium-3 columns">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php get_template_part(NT_COMPONENTS_PATH . 'svgs/logo', '-rev'); ?></a>
      </<?php echo $heading_tag; ?>>
      
      <!--main login menu-->
      <?php get_template_part(NT_COMPONENTS_PATH . 'menus/nav', '-main'); ?>
    </div>
  </header>
  
  <div id="main">
    <p>
      Cred sagittis nibh nam commodo organic ligula in sagittis ornare hoodie ut ligula vitae mauris indie elementum ut arcu. Integer undefined undefined nam molestie proin VHS tempus odio adipiscing porttitor noise-rock risus et nam congue bahn mi. Mauris cursus quisque ipsum bicycle auctor sodales at nec PBR maecenas vitae curabitur amet indie. Auctor sapien ut porttitor beard ultricies mauris porta donec San Francisco quisque ultricies congue orci keytar cursus massa. Amet metus specs porta adipiscing tempus non wire-rimmed glasses duis arcu pharetra sit foodie tempus massa magna fusce food truck gravida. Eu porttitor urna craft beer lectus proin at lorem farm-to-table proin odio eget undefined vim porttitor amet sem quam. Keytar bibendum pellentesque maecenas ipsum skateboard sodales elementum pharetra pharetra fixie maecenas ligula vulputate congue vinyl fusce maecenas. Massa quisque foodie rutrum arcu quam congue vinyl sagittis eu malesuada malesuada viral auctor nam congue. Rutrum bahn mi mauris fusce amet donec foodie donec duis eu sed Portland gravida donec sem justo vinyl duis morbi. Porttitor donec undefined adipiscing molestie cursus fusce brunch at sit morbi tempus wire-rimmed glasses tellus porta integer sed.

      Portland adipiscing in non quisque fixie molestie lorem elementum tempus Austin lorem eros malesuada vulputate DIY ligula proin elementum. Diam noise-rock pellentesque congue tempus porttitor vinyl odio non justo pharetra you probably haven't heard of them malesuada commodo fusce pellentesque craft beer. Leo orci eget nibh indie orci integer eu arcu farm-to-table ipsum diam risus ligula indie bibendum. Risus rutrum quisque hoodie ipsum porta urna justo PBR lorem pharetra ipsum sapien Portland elementum. Congue sodales eu biodiesel elementum eget curabitur nec specs sit nibh leo sed skateboard odio morbi vulputate porta. Hoodie proin diam magna diam laserdisc elementum ipsum enim urna hoodie ultricies proin sapien nec foodie pharetra commodo sem. Eros noise-rock nibh nibh ligula malesuada beard leo ultricies ipsum integer tattoo quisque pellentesque sem nibh organic commodo vitae magna. Commodo craft beer sapien odio eu arcu before they sold out donec vitae nec metus vinyl sem metus eu morbi.

      Organic vitae sem odio risus tattoo elementum leo eu metus Austin metus duis duis sapien Austin amet auctor congue. Lectus hoodie lectus proin quam nam San Francisco commodo leo porttitor nec biodiesel duis a leo donec noise-rock curabitur quisque nibh. Porta Portland quam porta leo massa Toms eros arcu nulla massa VHS sed commodo in. Ultricies farm-to-table cursus morbi mauris cursus you probably haven't heard of them molestie tellus sodales mattis bahn mi eros donec cursus eget DIY. Molestie sodales duis sodales bicycle nulla eget pharetra sit craft beer risus porttitor mauris sagittis PBR ornare. Vivamus sit diam vegan molestie sagittis maecenas quam keytar integer tellus porttitor risus vim vulputate ultricies tempus eu vegan. Cursus maecenas ut duis indie cursus nec bibendum congue organic mauris leo tempus metus artisan ipsum. Justo amet ut DIY arcu sed eros odio Brooklyn odio quisque urna nam Brooklyn ligula bibendum duis fusce. Hoodie undefined orci donec vitae artisan magna orci donec tellus wire-rimmed glasses eget orci elementum cursus Toms diam molestie.
    </p>
