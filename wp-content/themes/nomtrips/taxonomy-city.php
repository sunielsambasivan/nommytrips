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
$city = new City(); //nt_debug($city);
$address = $city->name .', '. $city->state;

?>

<div class="card--map-overlay">
  <div class="dropdown-trigger" type="button" data-toggle="city-info">
    <div class="dropdown-trigger--title"><?php echo $city->name; ?></div>
    <button class="dropdown-trigger--menu-icon" type="button" data-toggle></button>
  </div>
  <div class="dropdown-pane card" id="city-info" data-dropdown data-auto-focus="true">
    <p><?php echo  $city->description; ?></p>
  </div>

  <div class="icon-bar">
    <ul class="menu dropdown menu" data-dropdown-menu data-options="clickOpen: true; disableHover: true">
      <li class="icon-bar--item--blue">
        <a href="#"><i class="fa fa-search text-blue"></i></a>
      </li>
      <li class="icon-bar--item icon-bar--item--teal is-dropdown-submenu-parent">
        <a href="#" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Calendar" data-v-offset="30" data-match-bg="true">
          <i class="fa fa-calendar text-teal"></i></a>
        <ul class="menu">
          <li><a href="#">Item 1A</a></li>
          <!-- ... -->
        </ul>
      </li>
      <li class="icon-bar--item icon-bar--item--red">
        <a href="#" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Choose a tag or something" data-v-offset="30" data-match-bg="true">
          <i class="fa fa-tag text-red"></i>
        </a>
      </li>
      <li class="icon-bar--item icon-bar--item--green">
        <a href="#" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Bookmark This" data-v-offset="30" data-match-bg="true">
          <i class="fa fa-bookmark text-green"></i>
        </a>
      </li>
      <li class="icon-bar--item icon-bar--item--orange">
        <a href="#" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Add Location" data-v-offset="30" data-match-bg="true">
          <i class="icon-bar--add-location fa fa-plus text-orange"></i>
          <i class="fa fa-map-marker text-orange"></i>
        </a>
      </li>
    </ul>
  </div>
</div>

<?php
/**
 * show the carousel of restuarants of this city
**/
$carousel = new Carousel( 'restaurant', 10, 'city', array($city->slug) );
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
<!-- <div class="new-map">
  <?php  // require get_template_directory()."/map-app/index.php";  ?>
</div> -->
<?php get_footer(); ?>
