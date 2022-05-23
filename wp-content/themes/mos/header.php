<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title( '|', true, 'right' ) ?></title>
		<meta name="author" content="">
		<link rel="author" href="">
		<?php wp_head() ?>
    </head>

    <body <?php body_class() ?>>
      <!-- abilitato l'immagine in evidenza nell'header come background -->
      <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
		  <header id="page-header" class="bgHeader header-medium-heigth" style="background-image: url('<?php echo $thumb['0'];?>')">

        <a id="page-logo" href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?> <?php bloginfo('description') ?>">
          <img src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          echo $image[0]; ?>" alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
        </a>

      <?php
      /* uso l'header personalizzato */
      //define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
      require('menu.php');
      ?>


		</header>
		<div id="content-wrap">
