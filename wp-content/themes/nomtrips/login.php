<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * logon Template
 * Template Name: Login
 *
 * @file           login.php
 * @package        NotTrips
 * @author         Suniel Sambasivan
 * @copyright      2015 - 2016 Suniel Sambasivan
 */

get_header(); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <section class="post-content">

        <?php if ( has_post_thumbnail()) : ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            <?php the_post_thumbnail(); ?>
          </a>
        <?php endif; ?>

        <?php the_content(); ?>
   <!---<?php $sdf = get_option( 'foo_oauth_demo_settings'); ?>
        <pre>
          <?php echo $sdf['google_app_client_id'];?>
        </pre>
        <script language="javascript">
// We'll declare the google_access_token variable outside of our jQuery to make it easier to pass the value around.
var google_access_token = '';
jQuery(document).ready(function($) {
  var GOOGLECLIENTID = "<?php echo $sdf['google_app_client_id']; ?>";
  var GOOGLECLIENTREDIRECT = "<?php echo $sdf['google_app_redirect_uri']; ?>";
  console.log(GOOGLECLIENTREDIRECT);
  // we don't need the client secret for this, and should not expose it to the web.

  function requestGoogleoAuthCode() {
   var OAUTHURL = 'https://accounts.google.com/o/oauth2/auth';
   var SCOPE = 'profile email openid https://www.googleapis.com/auth/youtube';
   var popupurl = OAUTHURL + '?scope=' + SCOPE + '&client_id=' + GOOGLECLIENTID + '&redirect_uri=' + GOOGLECLIENTREDIRECT + '&response_type=token&prompt=select_account';
   var win =   window.open(popupurl, "googleauthwindow", 'width=800, height=600'); 
    var pollTimer   =   window.setInterval(function() { 
      try {
        if (win.document.URL.indexOf(GOOGLECLIENTREDIRECT) != -1) {
          window.clearInterval(pollTimer);
          var response_url =   win.document.URL;
          google_access_token =   gup(response_url, 'access_token');
          win.close();
          getGoogleUserInfo(google_access_token);
        }
      } catch(e) {
      }
    }, 500);
  }

  // helper function to parse out the query string params
  function gup(url, name) {
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?#&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    if( results == null )
      return "";
    else
      return results[1];
  }

  function getGoogleUserInfo(google_access_token) {
    $.ajax({
      url: 'https://www.googleapis.com/plus/v1/people/me/openIdConnect',
      data: {
        access_token: google_access_token
      },
      success: function(resp) {
        var user = resp;
        console.log(user);
        $('#googleUserName').text('You are logged in as ' + user.name);
        loggedInToGoogle = true;
        $('#google-login-block').hide();
        // let's show a logout link
        $('#google-logout-block').show();
      },
      dataType: "jsonp"
    });
  }

  function logoutFromGoogle() {
    $('#googleAuthIFrame').attr("src", "https://www.google.com/accounts/Logout");
    $('#google-login-block').show();
    $('#google-logout-block').hide();
    $('#googleUserName').text('You are not logged in');
    // null out the access token since we've logged out
    google_access_token = '';
  }

   $(function() {
    $('#google-login-block').click(requestGoogleoAuthCode);
    $('#google-logout-block').hide();
    $('#google-logout-block').click(logoutFromGoogle);
   });
});
</script>
<a id="google-login-block">Login to Google </a>
<span id="googleUserName">You are not logged in </span>
<span id="google-logout-block"><a>Logout from Google</a></span>
<iframe id="googleAuthIFrame" style="visibility:hidden;" width=1 height=1></iframe>

<script language="javascript">
  function getYouTubeVidInfo() {
    var video_id = $('#youtubevidid').val();
    jQuery.ajax({ 
      url: 'https://www.googleapis.com/youtube/v3/videos',
      method: 'GET',
      headers: {
        Authorization: 'Bearer ' + google_access_token
      },
      data: {
        part: 'status,snippet',
        id: video_id
      }
    }).done(function(response) { 
      if (response.items[0].snippet){
        var thisdata = response.items[0].snippet;
        $('#youtubevideodata').html('' + thisdata.title + ' ' + thisdata.description);
      }  
    });     
  }
  // Setup a click event for this function
  jQuery(function() {
    jQuery('#youtube-get-vidinfo').click(getYouTubeVidInfo);
   });
</script>

<input id="youtubevidid" type=text value="5ywjpbThDpE" /><a id="youtube-get-vidinfo">Get Video Info</a>
<div id="youtubevideodata"></div>
-->

      </section><!-- end of .post-entry -->
    </div><!-- end of #post-<?php the_ID(); ?> -->

    <?php comments_template( '', true );

  endwhile;

else :

  echo 'no content';

endif; ?>

<?php get_footer(); ?>
