<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * City Taxonomy Template
 *
 *
 * @file           taxonomy-city.php
 * @package        NotTrips
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header();

$term_id = get_queried_object()->term_id;
$term = get_term( $term_id, 'city' );
$city = new City($term_id); //nt_debug($city);
$address = $city->name .', '. $city->state;
$nt_post = new Nomtrip_Post(29);
?>

<div class="card-overlay">

  <div class="dropdown-trigger card" type="button" data-toggle="city-info">
    <div class="dropdown-trigger--title"><?php echo $city->name; ?></div>
    <button class="dropdown-trigger--menu-icon" type="button" data-toggle></button>
  </div>
  <div class="dropdown-pane card" id="city-info" data-dropdown data-auto-focus="true">
    <p><?php echo  $city->description; ?></p>
  </div>


  <div class="card">
    <div class="icon-bar">
      <ul class="menu">
        <li><a href="#"><i class="fa fa-search text-blue"></i></a></li>
        <li><a href="#"><i class="fa fa-calendar text-teal"></i></a></li>
        <li><a href="#"><i class="fa fa-tag text-red"></i></a></li>
        <li><a href="#"><i class="fa fa-bookmark text-green"></i></a></li>
        <li><a href="#"><i class="fa fa-map-marker text-orange"></i></a></li>
      </ul>
    </div>
  </div>
</div>

<div class="map-overlay-list">
  <div class="cards--carousel cards--carousel--map-overlay">
      <!--arrow buttons-->
      <div class="cards--carousel--btn"> <button type="button" data-role="none" class="slick-prev--images slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button> </div>

      <ul class="cards--carousel--container">

        <!--slide-->
        <li class="cards--carousel--slide small-12 medium-6">
          <div class="card--location">
            <div class="card--location--rating">
              <div class="indicator-likes--map">5</div>
            </div>
            <div class="card--location--title"><a href="<?php echo get_site_url() ?>/restaurants/new-york/joeys/">Joey's</a></div>
            <ul class="card--location--address">
              <li>123 345 Street</li>
              <li>New York, NY</li>
              <li class="cuisine">Cuisines: Italian, Chinese</li>
              <li>
                <span class="card--location--icon-bar">
                  <i class="fa fa-map-o"></i>
                  <i class="fa fa-list-ul"></i>
                </span>
              </li>
            </ul>
          </div>
        </li>

        <!--slide-->
        <li class="cards--carousel--slide small-12 medium-6">
          <div class="card--location">
            <div class="card--location--title">Luke's Lobster</div>
            <ul class="card--location--address">
              <li>84122 Kinfolk Echo Park</li>
              <li>New York, NY</li>
              <li class="cuisine">Cuisines: Italian, Chinese</li>
              <li>
                <span class="card--location--icon-bar">
                  <i class="fa fa-map-o"></i>
                  <i class="fa fa-list-ul"></i>
                </span>
              </li>
            </ul>
          </div>
        </li>

        <!--slide-->
        <li class="cards--carousel--slide small-12 medium-6">
          <div class="card--location">
            <div class="card--location--title">Matt's Kitchen</div>
            <ul class="card--location--address">
              <li>84122 Kinfolk Echo Park</li>
              <li>New York, NY</li>
              <li class="cuisine">Cuisines: Italian, Chinese</li>
              <li>
                <span class="card--location--icon-bar">
                  <i class="fa fa-map-o"></i>
                  <i class="fa fa-list-ul"></i>
                </span>
              </li>
            </ul>
          </div>
        </li>

        <!--slide-->
        <li class="cards--carousel--slide small-12 medium-6">
          <div class="card--location">
            <div class="card--location--title">Matt's Kitchen</div>
            <ul class="card--location--address">
              <li>84122 Kinfolk Echo Park</li>
              <li>New York, NY</li>
              <li class="cuisine">Cuisines: Italian, Chinese</li>
              <li>
                <span class="card--location--icon-bar">
                  <i class="fa fa-map-o"></i>
                  <i class="fa fa-list-ul"></i>
                </span>
              </li>
            </ul>
          </div>
        </li>

      </ul>

      <!--arrow buttons-->
      <div class="cards--carousel--btn"> <button type="button" data-role="none" class="slick-next--images slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button> </div>

    </div>
  </div>

  <!--end list-->




<div id="map" class="map"></div>
<script>
var map;
function initMap() {
  var address = '<?php echo $address; ?>';
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({
      'address': address
  }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      var Lat = results[0].geometry.location.lat();
      var Lng = results[0].geometry.location.lng();
      var myOptions = {
        zoom: 11,
        center: new google.maps.LatLng(Lat, Lng)
      };
      var map = new google.maps.Map(
        document.getElementById("map"), myOptions);
    } else {
      alert("Something got wrong " + status);
    }
  });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ81efbEIFdgwhEpO3rShce8gtN-9ahQA&callback=initMap" async defer></script>

<?php get_footer(); ?>
