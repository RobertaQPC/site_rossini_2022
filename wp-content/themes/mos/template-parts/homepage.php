<?php
/*
Template Name: Homepage
*/
?>

  <?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('header/no-header.php');
?>

<?php require('elements/blocco-swiper.php'); ?>

<div class="" id="wrap-custom-post">
  <?php get_template_part('loop',  'page'); ?>
  <div class="wrap-instagra-grid">
    <div class="wrap-row wp-block-group qpc-block-title">
      <div class="wrap-long-text">
        <div class="long-text"><?php esc_html_e( '@conservatoriorossini', 'mos-theme' ); ?>*</div>
        <div class="long-text"><?php esc_html_e( '@conservatoriorossini', 'mos-theme' ); ?>*</div>
      </div>
    </div>
    <div class="qpc-container-instagram-grid qpc-container">
      <?php
      echo do_shortcode('[catch-instagram-feed-gallery-widget title="" username="catch.themes" number="6" size="thumbnail"]');
      ?>
      <a class="cta-button cta-button-outline cta-button-centered cta-uppercase" href="https://www.instagram.com/conservatoriorossini/" target="_blank"><?php esc_html_e( 'Instagram @conservatoriorossini', 'mos-theme' ); ?></a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
