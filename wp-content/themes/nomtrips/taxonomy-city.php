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

<?php
/**
 * show the carousel of restuarants of this city
**/
$carousel = new Carousel( 'restaurant', 5, 'city', array($city->slug) );
$carousel->show_posts('map-overlay');
?>

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
