<?php
/*
$address['suiteno'] = isset( $custom_vars['nt_cpt_suite_no'] ) ? esc_html( $custom_vars['nt_cpt_suite_no'][0] ) : '';
$address['buildingno'] = isset( $custom_vars['nt_cpt_building_no'] ) ? esc_html( $custom_vars['nt_cpt_building_no'][0] ) : '';
$address['street'] = isset( $custom_vars['nt_cpt_street'] ) ? esc_html( $custom_vars['nt_cpt_street'][0] ) : '';
$address['city'] = isset( $city ) ? esc_html( $city ) : '';
$address['state'] = isset( $state ) ? esc_html( $state ) : '';
$address['neighborhood'] = isset( $neighborhoods[0]->term_id ) ? $neighborhoods[0]->name : '';
$neighborhood_string = $address['neighborhood'] != '' ? ', ' . $address['neighborhood'] : '';
$suite_string = $address['suiteno'] != '' ? $address['suiteno'] . ' &ndash; ' : '';
$address_string = $suite_string . $address['buildingno'] . ' ' . $address['street'] .  $neighborhood_string . ', ' . $address['city'] . ', ' . $address['state'];
*/
?>
<div class="card--restaurant">
  <div class="card--restaurant--map">
    <div id="map" class="map"></div>
  </div>
  <div class="card--restaurant--address">
    <span>
      <?php echo esc_html( $restaurant->get_address_string() ); ?>
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
    <a class="button-bar--btn font-size-lg-strict fa fa-globe"></a>
    <a class="button-bar--btn font-size-lg-strict fa fa-twitter"></a>
    <a class="button-bar--btn font-size-lg-strict fa fa-facebook-official"></a>
    <a class="button-bar--btn font-size-lg-strict fa fa-google-plus"></a>
    <a class="button-bar--btn font-size-lg-strict fa fa-instagram"></a>
  </div>
</div>
