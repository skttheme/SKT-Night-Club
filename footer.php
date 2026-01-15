<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Night Club
 */
$footer_text = get_theme_mod('footer_text');
?>

<div id="footer">
<div id="footer-wrapper">
  <div class="copyright-area">
    <?php if ( is_active_sidebar( 'fc-1-rfl' )) : ?>
    <div class="footerarea">
      <div class="container footer ftr-widg">
        <div class="footer-row">
          <?php if ( is_active_sidebar( 'fc-1-rfl' ) ) : ?>
          <div class="cols-3 widget-column-1">
            <?php dynamic_sidebar( 'fc-1-rfl' ); ?>
          </div>
          <!--end .widget-column-1-->
          <?php endif; ?>           
          <div class="clear"></div>
        </div>
      </div>
      <!--end .container--> 
    </div>
    <?php endif; ?>
  </div>
  <div class="copyright-wrapper">
    <div class="container">
      <div class="copyright-txt">
        <?php if (!empty($footer_text)) { ?>
        <?php echo esc_html($footer_text); ?>
        <?php } ?>
        <?php bloginfo('name'); ?>
        <?php esc_html_e('Theme By ','skt-night-club');?> <a href="<?php echo esc_url('https://www.sktthemes.org/product-category/music-artist/');?>" target="_blank">
        <?php esc_html_e('SKT Music Themes','skt-night-club'); ?>
        </a>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<!--end #copyright-area-->
<?php wp_footer(); ?>
</body>
</html>