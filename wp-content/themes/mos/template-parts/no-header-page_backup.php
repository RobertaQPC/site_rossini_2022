<?php
/*
Template Name: delete
*/
?>

  <?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('header/no-header.php');
?>

<?php require('elements/swiper.php'); ?>

<div class="wrap-custom-post" id="wrap-custom-post">
  <div class="heading-container">
        <h1 class="main-heading is-animated">Lorem Ipsum<br><span class="green-heading-bg">dolorem ips</span><br>hallo.<br></h1>
        <img class="main-img is-animated" src="<?php echo site_url(); ?>/wp-content/themes/mos/images/ice.jpg" alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>" />
      </div>
      <?php get_template_part('loop',  'page'); ?>
      <?php include(TEMPLATEPATH . "/template-parts/layout-manager/riga.php"); ?>
    </div>

  <?php require('elements/vetrina.php'); ?>
<?php get_footer(); ?>
