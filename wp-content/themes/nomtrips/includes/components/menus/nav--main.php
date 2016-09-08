<nav id="navMainMenu" role="navigation" class="small-3 medium-9 columns nav--main">
  <?php
  $user = wp_get_current_user();
  if( $user->ID ) {
    include( locate_template( NT_COMPONENTS_PATH .'menus/nav--logged-in--medium.php') );
  }

  else {

    //search cities if not home page
    if(!is_front_page())
      get_template_part(NT_COMPONENTS_PATH . 'forms/search', '-off-canvas-menu');

    wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-login' ) );
  }
  ?>
</div>