<div class="card--restaurant">
  <div class="card--restaurant--map">
    <img src="<?php echo get_template_directory_uri() ?>/images/placeholder-pin-map.jpg" alt="" />
  </div>
  <div class="card--restaurant--address">
    <span>
      <?php echo isset( $custom_vars['nt_cpt_suite_no'] ) ? esc_html( $custom_vars['nt_cpt_suite_no'][0] ) . ' &ndash; ' : '' ?>
      <?php echo isset( $custom_vars['nt_cpt_building_no'] ) ? esc_html( $custom_vars['nt_cpt_building_no'][0] ) . '&nbsp;' : '' ?>
      <?php echo isset( $custom_vars['nt_cpt_street'] ) ? esc_html( $custom_vars['nt_cpt_street'][0] ) . '&nbsp;' : '' ?>
      <?php echo isset( $city ) ? esc_html( $city ) . ',&nbsp;' : '' ?>
      <?php echo isset( $state ) ? esc_html( $state ) : '' ?>
    </span>
  </div>

  <div class="card--restaurant--phone">
    <?php echo isset( $custom_vars['nt_cpt_main_ph'] ) ? esc_html( nt_format_phone( $custom_vars['nt_cpt_main_ph'][0] ) ) : '' ?>
  </div>

  <div class="card--restaurant--price-category">
    <?php echo isset( $custom_vars['nt_cpt_cost'] ) ? esc_html( nt_price_range( $custom_vars['nt_cpt_cost'][0] ) ) : '' ?>
  </div>

  <div class="card--restaurant--cuisine">
    <?php echo isset( $cuisines[0]->term_id ) ? esc_html( nt_get_cuisines( $cuisines ) ) : '' ?>
  </div>

  <div class="card--restaurant--hours"><?php echo wp_kses_post( nt_get_hours() ); ?></div>

  <div class="button-bar margin-top">
    <a class="button-bar--btn fa fa-globe"></a>
    <a class="button-bar--btn fa fa-twitter"></a>
    <a class="button-bar--btn fa fa-facebook-official"></a>
    <a class="button-bar--btn fa fa-google-plus"></a>
    <a class="button-bar--btn fa fa-instagram"></a>
  </div>
</div>
