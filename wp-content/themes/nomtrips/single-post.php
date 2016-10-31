<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Template: single post
 * Description: a blog, review, dish
 * @file           single-post.php
 * @package        NomtTrips
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header(); ?>

<?php

/**
  * get post objects
**/
$nt_post = new Nomtrip_Post();
$restaurant_id = !empty( $nt_post->get_post_restaurant() ) ? $nt_post->get_post_restaurant()[0] : false;
$restaurant = $restaurant_id ? new Restaurant( $restaurant_id ) : false;
//nt_debug($restaurant);

/**
  * different types of posts (use later)
**/
$review_page = in_category('review');
$dish_page = in_category('dish');
$blog_page = in_category('blog');
?>

<div class="row" id="<?php echo esc_attr( $nt_post->slug ); ?>">

  <!--main content section-->
  <div class="content columns small-12 medium-7 large-9">

    <!--breadcrumb section-->
    <div class="breadcrumb">
      <span class="breadcrumb--item"><a href="#">Home</a></span>
      <span class="breadcrumb--divider">></span>
      <span class="breadcrumb--item"><a href="#">Restaurants</a></span>
      <span class="breadcrumb--divider">></span>
      <?php echo $restaurant ? '<span class="breadcrumb--item"><a href="' . get_term_link($restaurant->restaurant_location->city->term_id) . '">' . esc_html( $restaurant->restaurant_location->city->name ) . '</a></span><span class="breadcrumb--divider"> > </span>' : ''; ?>
      <?php echo $restaurant ? '<span class="breadcrumb--item"><a href="' . $restaurant->restaurant_url . '">' . esc_html( $restaurant->restaurant_name ) . '</a></span><span class="breadcrumb--divider"> > </span>' : ''; ?>
      <span class="breadcrumb--item">War on Taste, Buds</span>
    </div>

    <!--heading section-->
    <section class="row content--heading--post">
      <h1 class="columns content--heading--title"><?php the_title(); ?></h1>
      <div class="columns star-rating">
        <i class="star-rating--star fa fa-star-o"></i>
        <i class="star-rating--star fa fa-star-o"></i>
        <i class="star-rating--star fa fa-star-o"></i>
        <i class="star-rating--star fa fa-star-o"></i>
      </div>
      <div class="columns small-12 content--by-line">written by: <a href="#">vic</a> || <span class="content--date">October 20, 2016</span></div>
    </section>

    <!--post content section-->
    <div class="row">
      <section class="columns small-12 content--post">
        <?php the_content(); ?>
      </section>
    </div>

    <!--bookmark section-->
    <div class="row">
      <section class="columns small-12">
        <h5>Share</h5>
        <div class="button-bar button-bar--social">
          <a class="button-bar--btn">
            <span class="fa fa-facebook"></span>
            <span class="button-bar--label">Facebook</span>
          </a>
          <a class="button-bar--btn">
            <span class="fa fa-twitter"></span>
            <span class="button-bar--label">Facebook</span>
          </a>
          <a class="button-bar--btn">
            <span class="fa fa-envelope"></span>
            <span class="button-bar--label">Email</span>
          </a>
          <a class="button-bar--btn">
            <span class="fa fa-google"></span>
            <span class="button-bar--label">Google</span>
          </a>
        </div>
      </section>
    </div>
    <!--end bookmark section-->

   </div>
   <!--end main column-->

   <!--sidebar content section-->
   <div class="content columns small-12 medium-5 large-3">

     <!--restaurant card-->
     <div class="cards">
       <?php include( locate_template( NT_COMPONENTS_PATH .'cards/card--restaurant.php') ); ?>
     </div>

     <!--Hot on Nomtrips-->
      <div class="cards">
        <div class="cards--heading">
          <h2 class="cards--title">Hot on Nomtrips</h2>
        </div>

        <div class="card">
          <div class="list--location">
            <!--list item-->
            <div class="list--location--item">
              <div class="list--location--image">
                <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-food-sq' ); //nt_debug($imgsrc); ?>
                <img src="<?php echo esc_url($imgsrc[0]); ?>" />

                <div class="list--location--rating">
                  <div class="indicator-likes">5</div>
                </div>
              </div>
              <div class="list--location--content">
                <div class="list--location--title">Ippudo NYC</div>

                <div class="list--location--location">
                  <div class="list--location--map-pin fa fa-map-marker"></div>

                  <ul class="list--location--address">
                    <li>10022 intelligentsia marfa Ave</li>
                    <li>New York, NY</li>
                    <li>USA</li>
                    <li>+905 394 1233</li>
                  </ul>
                </div>
              </div>
            </div>

            <!--list item-->
            <div class="list--location--item">
              <div class="list--location--image">
                <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-food-sq' ); //nt_debug($imgsrc); ?>
                <img src="<?php echo esc_url($imgsrc[0]); ?>" />

                <div class="list--location--rating">
                  <div class="indicator-likes">5</div>
                </div>
              </div>

              <div class="list--location--content">
                <div class="list--location--title">Ippudo NYC</div>
                <div class="list--location--location">
                  <div class="list--location--map-pin fa fa-map-marker"></div>

                  <ul class="list--location--address">
                    <li>10022 intelligentsia marfa Ave</li>
                    <li>New York, NY</li>
                    <li>USA</li>
                    <li>+905 394 1233</li>
                  </ul>
                </div>
              </div>
            </div>

            <!--list item-->
            <div class="list--location--item">
              <div class="list--location--image">
                <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-food-sq' ); //nt_debug($imgsrc); ?>
                <img src="<?php echo esc_url($imgsrc[0]); ?>" />

                <div class="list--location--rating">
                  <div class="indicator-likes">5</div>
                </div>
              </div>

              <div class="list--location--content">
                <div class="list--location--title">Ippudo NYC</div>

                <div class="list--location--location">
                  <div class="list--location--map-pin fa fa-map-marker"></div>

                  <ul class="list--location--address">
                    <li>10022 intelligentsia marfa Ave</li>
                    <li>New York, NY</li>
                    <li>USA</li>
                    <li>+905 394 1233</li>
                  </ul>
                </div>
              </div>
            </div>

            <!--list item-->
            <div class="list--location--item">
              <div class="list--location--image">
                <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-food-sq' ); //nt_debug($imgsrc); ?>
                <img src="<?php echo esc_url($imgsrc[0]); ?>" />

                <div class="list--location--rating">
                  <div class="indicator-likes">5</div>
                </div>
              </div>

              <div class="list--location--content">
                <div class="list--location--title">Ippudo NYC</div>

                <div class="list--location--location">
                  <div class="list--location--map-pin fa fa-map-marker"></div>

                  <ul class="list--location--address">
                    <li>10022 intelligentsia marfa Ave</li>
                    <li>New York, NY</li>
                    <li>USA</li>
                    <li>+905 394 1233</li>
                  </ul>
                </div>
              </div>
            </div>

          </div><!--end list location-->
        </div><!--end card-->
      </div><!--end cards-->

   </div>
   <!--end sidebar content section-->

</div>
<!--end row-->

<script>
var map;
function initMap() {
  var address = '<?php echo $restaurant->get_address_string(); ?>';
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
