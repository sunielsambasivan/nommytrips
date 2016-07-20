<nav role="navigation" class="nav--logged-in">
  <?php
  $email = $user->data->user_email;
  ?>
  <div class="columns small-4">
    <?php
      if (function_exists('get_avatar')) {
        echo get_avatar($email);
      } 
     
      else {
        //alternate gravatar code for < 2.5
        $grav_url = "http://www.gravatar.com/avatar/" . 
        md5(strtolower($email)) . "?d=" . urlencode($default) . "&s=" . $size;
        echo "<img src='$grav_url'/>";
      }
    ?>
  </div>
  <div class="columns small-8">
  </div>
  <ul>
    <li><li>
  </ul>
</div>