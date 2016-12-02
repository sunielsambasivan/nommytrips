<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Restaurant Template
 *
 * @file           restaurant.php
 * @package        NomTrips
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header(); ?>

<?php
/**
 * new restaurant object
**/

$restaurant = new Restaurant();

/*
nt_debug($restaurant);
*/
?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="row">
      <div class="content columns small-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!--breadcrumb section-->
        <div class="breadcrumb">
          <span class="breadcrumb--item"><a href="#">Home</a></span>
          <span class="breadcrumb--divider">></span>
          <span class="breadcrumb--item"><a href="#">Restaurants</a></span>
          <span class="breadcrumb--divider">></span>
          <span class="breadcrumb--item"><a href="#"><?php echo esc_html($restaurant->restaurant_location->city->name) ?></a></span>
          <span class="breadcrumb--divider">></span>
          <span class="breadcrumb--item"><?php echo esc_html($restaurant->restaurant_name) ?></span>
        </div>

        <!--heading section-->
        <section class="row content--heading--restaurant">
          <h1 class="columns content--heading--title"><?php the_title(); ?></h1>

          <div class="columns indicator-likes--sm"><?php echo esc_html( $restaurant->restaurant_rating->value) ?></div>

          <div class="columns star-rating">
            <i class="star-rating--star fa fa-star-o"></i>
            <i class="star-rating--star fa fa-star-o"></i>
            <i class="star-rating--star fa fa-star-o"></i>
            <i class="star-rating--star fa fa-star-o"></i>
          </div>
        </section>

        <!--post content section-->
        <div class="row">
          <section class="columns small-12 post-content">
            <?php the_content(); ?>
          </section><!-- end of .post-entry -->
        </div><!--end of row-->

        <!--bookmark section-->
        <div class="row">
          <section class="columns small-12">
            <div class="button-bar">
              <a class="button-bar--btn fa fa-heart"></a>
              <a class="button-bar--btn fa fa-bookmark"></a>
              <a class="button-bar--btn button-bar--nt-icon">
                <span class="icon-nomtrips-logomark"></span>
                <span class="button-bar--label">Add to Trip</span>
              </a>
              <a class="button-bar--btn">
                <span class="fa fa-pencil"></span>
                <span class="button-bar--label">Write a Review</span>
              </a>
            </div>
          </section>
        </div><!--end of row-->

        <!--restaurant details section-->
        <div class="row content-desc--restaurant">

          <!--left col-->
          <section class="columns small-12 large-3">
            <div class="cards">
              <?php include( locate_template( NT_COMPONENTS_PATH .'cards/card--restaurant.php') ); ?>
            </div>
          </section>

          <!--middle col-->
          <section class="columns small-12 large-6 cards">

            <!--cards carousel section-->
            <div class="cards">
              <div class="cards--heading">
                <h2 class="cards--title">Must Eats</h2>
                <div class="cards--buttons column">
                  <a href="#" class="button-icon fa fa-cutlery">Add Dish</a>
                </div>
              </div>

              <div class="cards--carousel" data-carousel-init="cardsCarouselPageRestaurant">
                <div class="cards--carousel--btn"> <button type="button" data-role="none" class="slick-prev--must-eats slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button> </div>
                  <ul class="cards--carousel--container">

                    <!--slide 1-->
                    <li class="cards--carousel--slide small-12 medium-6">
                      <div class="card--dish">
                        <div class="card--dish--image">
                          <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                          <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                        </div>
                        <div class="card--dish--content">
                          <div class="card--dish--title">Pork Buns</div>
                          <div class="card--dish--likes">10 people nommed</div>
                        </div>
                      </div>
                    </li>

                    <!--slide 2-->
                    <li class="cards--carousel--slide small-12 medium-6">
                      <div class="card--dish">
                        <div class="card--dish--image">
                          <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                          <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                        </div>
                        <div class="card--dish--content">
                          <div class="card--dish--title">Pork Buns More</div>
                          <div class="card--dish--likes">10 people nommed</div>
                        </div>
                      </div>
                    </li>

                    <!--slide 3-->
                    <li class="cards--carousel--slide small-12 medium-6">
                      <div class="card--dish">
                        <div class="card--dish--image">
                          <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                          <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                        </div>
                        <div class="card--dish--content">
                          <div class="card--dish--title">Pork Buns More-er</div>
                          <div class="card--dish--likes">10 people nommed</div>
                        </div>
                      </div>
                    </li>

                    <!--slide 4-->
                    <li class="cards--carousel--slide small-12 medium-6">
                      <div class="card--dish">
                        <div class="card--dish--image">
                          <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                          <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                        </div>
                        <div class="card--dish--content">
                          <div class="card--dish--title">Pork Buns More-er-er</div>
                          <div class="card--dish--likes">10 people nommed</div>
                        </div>
                      </div>
                    </li>

                  </ul>
                  <div class="cards--carousel--btn"> <button type="button" data-role="none" class="slick-next--must-eats slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button> </div>
              </div><!--end cards-carousel-->
            </div><!--end cards-->

            <div class="cards">
              <!--Menu Section-->
              <div class="cards--heading">
                <h2 class="cards--title">Menu</h2>
                <div class="cards--buttons column">
                  <a href="#" class="button-icon fa fa-pencil column">Add Menu</a>
                </div>
              </div>

              <div class="card--list-select">
                <div class="card--list-select--item">
                  <div class="card--list-select--title">
                  Lunch
                  </div>
                </div>

                <div class="card--list-select--item">
                  <div class="card--list-select--title">
                  Dinner
                  </div>
                </div>

                <div class="card--list-select--item">
                  <div class="card--list-select--title">
                  Special
                  </div>
                </div>
              </div>
              <!--/menu section-->
            </div><!--end cards-->

            <div class="cards">
              <!--photo section-->
              <div class="cards--heading">
                <h2 class="cards--title">Photos</h2>
                <div class="cards--buttons column">
                  <a href="#" class="button-icon fa fa-image">Add Image</a>
                </div>
              </div>

              <div class="cards--carousel" data-carousel-init="cardsCarouselPageRestaurant">
                <div class="cards--carousel--btn">
                  <button type="button" data-role="none" class="slick-prev--images slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
                </div>

                <ul class="cards--carousel--container">
                  <!--slide 1-->
                  <li class="cards--carousel--slide small-12 medium-6">
                    <div class="card--dish">
                      <div class="card--dish--image">
                        <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                        <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                      </div>
                      <div class="card--dish--content">
                        <div class="card--dish--title">Pork Buns</div>
                        <div class="card--dish--likes">10 people nommed</div>
                      </div>
                    </div>
                  </li>

                  <!--slide 2-->
                  <li class="cards--carousel--slide small-12 medium-6">
                    <div class="card--dish">
                      <div class="card--dish--image">
                        <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                        <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                      </div>
                      <div class="card--dish--content">
                        <div class="card--dish--title">Pork Buns More</div>
                        <div class="card--dish--likes">10 people nommed</div>
                      </div>
                    </div>
                  </li>

                  <!--slide 3-->
                  <li class="cards--carousel--slide small-12 medium-6">
                    <div class="card--dish">
                      <div class="card--dish--image">
                        <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                        <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                      </div>
                      <div class="card--dish--content">
                        <div class="card--dish--title">Pork Buns More-er</div>
                        <div class="card--dish--likes">10 people nommed</div>
                      </div>
                    </div>
                  </li>

                  <!--slide 4-->
                  <li class="cards--carousel--slide small-12 medium-6">
                    <div class="card--dish">
                      <div class="card--dish--image">
                        <?php $imgsrc = wp_get_attachment_image_src( 103, 'thumb-card' ); ?>
                        <img src="<?php echo esc_url($imgsrc[0]); ?>" />
                      </div>
                      <div class="card--dish--content">
                        <div class="card--dish--title">Pork Buns More-er-er</div>
                        <div class="card--dish--likes">10 people nommed</div>
                      </div>
                    </div>
                  </li>
                </ul>

                <div class="cards--carousel--btn">
                  <button type="button" data-role="none" class="slick-next--images slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button>
                </div>
              </div><!--end carousel section-->
            </div><!--end cards-->

            <div class="cards">
              <!--review section-->
              <div class="cards--heading">
                <h2 class="cards--title">Review</h2>
                <div class="cards--buttons column">
                  <a href="#" class="button-icon fa fa-pencil">Write a Review</a>
                </div>
              </div>

              <div class="list--review">

                <!--review-item-->
                <div class="list--review--item">
                  <div class="list--review--image">
                    <div class="profile--avatar">
                      <div class="image">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/09/ron_swanson.jpg" />
                      </div>
                    </div>
                  </div>
                  <div class="list--review--meta">
                    <div class="list--location--title list--review--title"><strong>Rob Swansen</strong></div>
                    <div>10 review(s)</div>
                    <div class="indicator-likes indicator-likes--sm list--review-likes">5</div>
                  </div>
                  <div class="list--review--desc">
                    Tofu adipiscing gravida wire-rimmed glasses lorem auctor food truck molestie non specs commodo nulla food truck et sed fixie diam. Orci Portland tempus sagittis noise-rock enim curabitur noise-rock leo in biodiesel duis congue organic risus elementum Toms ipsum.
                  </div>
                </div>

                <!--review-item-->
                <div class="list--review--item">
                  <div class="list--review--image">
                    <div class="profile--avatar">
                      <div class="image">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/09/ron_swanson.jpg" />
                      </div>
                    </div>
                  </div>
                  <div class="list--review--meta">
                    <div class="list--location--title list--review--title"><strong>Rob Swansen</strong></div>
                    <div>10 review(s)</div>
                    <div class="indicator-likes indicator-likes--sm list--review-likes">5</div>
                  </div>
                  <div class="list--review--desc">
                    Tofu adipiscing gravida wire-rimmed glasses lorem auctor food truck molestie non specs commodo nulla food truck et sed fixie diam. Orci Portland tempus sagittis noise-rock enim curabitur noise-rock leo in biodiesel duis congue organic risus elementum Toms ipsum.
                  </div>
                </div>

                <!--review-item-->
                <div class="list--review--item">
                  <div class="list--review--image">
                    <div class="profile--avatar">
                      <div class="image">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/09/ron_swanson.jpg" />
                      </div>
                    </div>
                  </div>
                  <div class="list--review--meta">
                    <div class="list--location--title list--review--title"><strong>Rob Swansen</strong></div>
                    <div>10 review(s)</div>
                    <div class="indicator-likes indicator-likes--sm list--review-likes">5</div>
                  </div>
                  <div class="list--review--desc">
                    Tofu adipiscing gravida wire-rimmed glasses lorem auctor food truck molestie non specs commodo nulla food truck et sed fixie diam. Orci Portland tempus sagittis noise-rock enim curabitur noise-rock leo in biodiesel duis congue organic risus elementum Toms ipsum.
                  </div>
                </div>

              </div>
            </div><!--end cards-->

            <!--more reviews-->
            <div class="accordion" data-accordion data-allow-all-closed="true">
              <div class="accordion-item" data-accordion-item>
                <a class="accordion-title link link--more">More Reviews</a>
                <div class="accordion-content list--review" data-tab-content>

                  <!--review-item-->
                  <div class="list--review--item">
                    <div class="list--review--image">
                      <div class="profile--avatar">
                        <div class="image">
                          <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/09/ron_swanson.jpg" />
                        </div>
                      </div>
                    </div>
                    <div class="list--review--meta">
                      <div class="list--location--title list--review--title"><strong>Rob Swansen</strong></div>
                      <div>10 review(s)</div>
                      <div class="indicator-likes indicator-likes--sm list--review-likes">5</div>
                    </div>
                    <div class="list--review--desc">
                      Tofu adipiscing gravida wire-rimmed glasses lorem auctor food truck molestie non specs commodo nulla food truck et sed fixie diam. Orci Portland tempus sagittis noise-rock enim curabitur noise-rock leo in biodiesel duis congue organic risus elementum Toms ipsum.
                    </div>
                  </div><!--end list-review-item-->

                  <!--review-item-->
                  <div class="list--review--item">
                    <div class="list--review--image">
                      <div class="profile--avatar">
                        <div class="image">
                          <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/09/ron_swanson.jpg" />
                        </div>
                      </div>
                    </div>
                    <div class="list--review--meta">
                      <div class="list--location--title list--review--title"><strong>Rob Swansen</strong></div>
                      <div>10 review(s)</div>
                      <div class="indicator-likes indicator-likes--sm list--review-likes">5</div>
                    </div>
                    <div class="list--review--desc">
                      Tofu adipiscing gravida wire-rimmed glasses lorem auctor food truck molestie non specs commodo nulla food truck et sed fixie diam. Orci Portland tempus sagittis noise-rock enim curabitur noise-rock leo in biodiesel duis congue organic risus elementum Toms ipsum.
                    </div>
                  </div><!--end list-review-item-->

                </div><!--end accordion-content-->
              </div><!--end accordion-item-->
            </div><!--end accordion-->

          </section>
          <!--end middle section-->

          <!--right col-->
          <section class="columns small-12 large-3">

            <div class="cards">
              <!--nom tips section-->
              <div class="cards--heading">
                <h2 class="cards--title">NomTips</h2>
              </div>

              <div class="cards--nomlists">
                <div class="media-object media-object--nomtip">
                  <div class="media-object-section">
                    <div class="profile--avatar">
                      <div class="image">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/09/ron_swanson.jpg" />
                      </div>
                      <a class="link font-size-xs-strict text-center">Rob's tip</a>
                    </div>
                  </div>
                  <div class="media-object-section">
                    <div class="speech-bubble">
                      <div class="speech-bubble--content">
                        Be there early! acon ipsum dolor amet short loin pork chop corned beef sirloin brisket chuck shoulder leberkas filet mignon turkey.
                      </div>
                      <div class="speech-bubble--arrow"></div>
                    </div>
                  </div>
                </div>

                <div class="media-object media-object--nomtip">
                  <div class="media-object-section">
                    <div class="profile--avatar">
                      <div class="image">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/09/ron_swanson.jpg" />
                      </div>
                      <a class="link font-size-xs-strict text-center">Rob's tip</a>
                    </div>
                  </div>
                  <div class="media-object-section">
                    <div class="speech-bubble">
                      <div class="speech-bubble--content">
                        Be there early! acon ipsum dolor amet short loin pork chop corned beef sirloin brisket chuck shoulder leberkas filet mignon turkey.
                      </div>
                      <div class="speech-bubble--arrow"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--end cards-->

            <div class="cards">
              <div class="feedback-form">
                <form class="feedback-form--form">
                  <textarea class="feedback-form--textarea" placeholder="Got a tip? Tell us in 140 characters or less!"></textarea>
                  <input type="submit" class="feedback-form--submit button small blue right" value"Add Nomtip" />
                </form>
              </div>
            </div><!--end cards-->

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

          </section>
          <!--end right col-->

        </div><!--end of row-->

      </div><!-- end of #post-<?php the_ID(); ?> -->
    </div><!--end of row-->
    <?php comments_template( '', true );

  endwhile;

else :

  echo 'no content';

endif; ?>

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
