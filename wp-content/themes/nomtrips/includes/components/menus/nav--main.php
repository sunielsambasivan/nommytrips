<nav id="navMainMenu" role="navigation" class="small-3 medium-9 columns nav--main">
  <?php
  $user = wp_get_current_user(); 
  //nt_debug($user);
  if( $user->ID ) {
    include( locate_template( NT_COMPONENTS_PATH .'menus/nav--logged-in--medium.php') );
  } 

  else {
    wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-login' ) ); 
  }
  ?>
</div>