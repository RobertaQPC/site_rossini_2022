<?php
/*
Template Name: Pagina con header
*/
?>
<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('header/full-header.php');
?>
<?php require('elements/blocco-swiper.php'); ?>
  <div class="qpc-container" id="wrap-custom-post">
      <?php get_template_part('loop',  'page'); ?>
  </div>

<?php get_footer(); ?>
