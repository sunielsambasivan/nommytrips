<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/* load settings */
require_once ( get_stylesheet_directory() . '/includes/global-variables.php' );

/* load classes */
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-post-type.php' );
require_once ( NT_INCLUDE_PATH . 'classes/class-custom-metadata-form.php' );

/* load custom plugins */
require( NT_PLUGIN_PATH_REL . 'nt-cpt-restaurant/nt-cpt-restaurant.php' );