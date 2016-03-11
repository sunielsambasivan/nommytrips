<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/* load settings */
require_once ( get_stylesheet_directory() . '/includes/global-variables.php' );

/* custom functions */
require_once ( NT_INCLUDE_PATH . '/functions/nt-functions.php' );

/* load classes */
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-post-type.php' );
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-metadata-form.php' );
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-taxonomy.php' );

/* load 3rd party plugins */
require ( NT_PLUGIN_PATH . 'Tax-meta-class/Tax-meta-class.php' );

/* load custom plugins */
require ( 'plugins/nt-cpt-restaurant/nt-cpt-restaurant.php' );
require ( 'plugins/nt-taxonomies/nt-taxonomies.php' );