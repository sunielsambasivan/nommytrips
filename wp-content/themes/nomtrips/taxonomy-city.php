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
  <div class="card">
    <div class="dropdown-trigger" type="button" data-toggle="city-info">
      <div class="dropdown-trigger--title"><?php echo $city->name; ?></div>
      <button class="dropdown-trigger--menu-icon" type="button" data-toggle></button>
    </div>
    <div class="dropdown-pane" id="city-info" data-dropdown data-auto-focus="true">
      <p><?php echo  $city->description; ?></p>
    </div>
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
  <div class="map-overlay-list--slides">
      <!--slide-->
      <li class="orbit-slide is-active">
        <div class="card--location">
          <div class="card--location--title">Mexico Place</div>
          <ul class="card--location--address">
            <li>987654 Zoro Mari Park</li>
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
      <li class="orbit-slide hide-mobile">
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
      <li class="orbit-slide hide-mobile">
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
  </div>
  <nav class="orbit-bullets">
        <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
        <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
        <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
        <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
      </nav>
  <!--end list-->
</div>



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
