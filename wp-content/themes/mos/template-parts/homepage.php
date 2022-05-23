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
    </div>
    <?php require('elements/vetrina.php'); ?>

<?php get_footer(); ?>
