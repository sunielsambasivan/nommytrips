<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/* load settings */
require_once ( get_stylesheet_directory() . '/includes/global-variables.php' );

/* custom functions */
require_once ( NT_INCLUDE_PATH . '/functions/nt-functions.php' );
require_once ( NT_INCLUDE_PATH . '/functions/nt-actions.php' );

/* load classes */
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-post-type.php' );
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-metadata-form.php' );
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-taxonomy.php' );
require_once ( NT_INCLUDE_PATH . 'classes/class-banner.php' );
require_once ( NT_INCLUDE_PATH . 'classes/class-city.php' );

/* menus */
require_once ( NT_INCLUDE_PATH . 'functions/nt-menus.php' );

/* load 3rd party plugins */
require ( NT_PLUGIN_PATH . 'Tax-meta-class/Tax-meta-class.php' );

/* load images sizes and helpers */
require_once ( NT_INCLUDE_PATH . 'functions/nt-image-sizes.php' );

/* load custom plugins and fields */
require_once ( NT_INCLUDE_PATH . '/fields/nt-fields-contact.php' );
require ( 'plugins/nt-cpt-restaurant/nt-cpt-restaurant.php' );
require ( 'plugins/nt-taxonomies/nt-taxonomies.php' );
require_once ( NT_INCLUDE_PATH . '/fields/nt-fields-social.php' );

/*stylesheets & scripts*/
require_once ( NT_INCLUDE_PATH . '/functions/nt-stylesheets.php' );
require_once ( NT_INCLUDE_PATH . '/functions/nt-scripts.php' );