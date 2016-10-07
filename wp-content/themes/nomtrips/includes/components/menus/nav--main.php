<div  class="small-3 medium-9">
  <div class="row">
    <?php
    $user = wp_get_current_user();
    $is_front = !is_front_page() ? false : true;

    if(!$is_front) { ?>
      <div class="column small-3">
        <?php //search cities if not home page
        get_template_part(NT_COMPONENTS_PATH . 'forms/search', '-off-canvas-menu');
        ?>
      </div>
    <?php } ?>

    <nav id="navMainMenu" role="navigation" class="nav--main column<?php echo !$is_front ? ' small-9' : ' small-12' ?>">
      <?php
      if( $user->ID ) {
        include( locate_template( NT_COMPONENTS_PATH .'menus/nav--logged-in--medium.php') );
      }

      else {
        wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu-login' ) );
      }
      ?>
    </nav>
  </div><!--/row-->
</div>