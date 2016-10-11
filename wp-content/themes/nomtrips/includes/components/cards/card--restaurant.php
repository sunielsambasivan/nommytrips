<div class="card--restaurant">
  <div class="card--restaurant--map">
    <img src="<?php echo get_template_directory_uri() ?>/images/placeholder-pin-map.jpg" alt="" />
  </div>
  <div class="card--restaurant--address">
    <span><?php echo isset( $custom_vars['nt_cpt_suite_no'] ) ? $custom_vars['nt_cpt_suite_no'][0] . '&ndash;' : '' ?></span>
    <span><?php echo isset( $custom_vars['nt_cpt_building_no'] ) ? $custom_vars['nt_cpt_building_no'][0] . '&nbsp;' : '' ?></span>
    <span><?php echo isset( $custom_vars['nt_cpt_street'] ) ? $custom_vars['nt_cpt_street'][0] . '&nbsp;' : '' ?></span>
    <span><?php echo $city ? $city . ',&nbsp;' : '' ?></span>
    <span><?php echo $state ? $state : '' ?></span>
  </div>
  <div class="card--restaurant--phone"><?php echo isset( $custom_vars['nt_cpt_main_ph'] ) ? nt_format_phone( $custom_vars['nt_cpt_main_ph'][0] ) : '' ?></div>
  <div class="card--restaurant--price-category"></div>
  <div class="card--restaurant--hours"></div>
</div>
