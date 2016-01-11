<?php
/**
 * Template for displaying the footer
 *
 * @package nomtrips
 */
?>
  </div><!-- #main -->

  <div id="footer" role="contentinfo">

    <div id="credits">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
      </a>
    </div><!-- #site-info -->

  </div><!-- #footer -->

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>
