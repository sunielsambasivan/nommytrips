<?php
/**
 * Description: Custom buttons to create blog posts associated with restaurant.
 * Adds a meta box and custom html using the add_meta_box callback.
 * creates cookie and forwards page to create blog post page.
**/

function nt_restaurant_metabox_add_buttons_init() {
  add_meta_box( 'nt_restaurant_metabox_add_buttons_box',
  'Add Reviews, Dishes, or Tips etc',
  'nt_restaurant_metabox_add_buttons_callback',
  'restaurant', 'normal', 'high'
  );
}

add_action( 'admin_init', 'nt_restaurant_metabox_add_buttons_init' );

function nt_restaurant_metabox_add_buttons_callback( $restaurant ) {
?>
  <table>
    <tr>
      <td>Add Review</td>
      <td>
          <a data-post-id="<?php echo $restaurant->ID; ?>" href="<?php echo get_admin_url() . '/post-new.php'; ?>" class="button">Add Review</a>
      </td>
    </tr>
  </table>

<?php
//nt_debug();
}